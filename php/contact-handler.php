<?php
/**
 * Contact Form Handler
 * Processes contact form submissions and sends emails
 */

require_once 'config.php';

// Set JSON header
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
    exit;
}

// Check rate limit
if (!checkRateLimit()) {
    echo json_encode([
        'success' => false,
        'message' => 'Too many requests. Please try again later.'
    ]);
    exit;
}

// Verify CSRF token (if enabled)
if (ENABLE_CSRF) {
    $csrfToken = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrfToken)) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid security token. Please refresh the page and try again.'
        ]);
        exit;
    }
}

// Get and sanitize form data
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$subject = sanitizeInput($_POST['subject'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!validateEmail($email)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
} elseif (strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters long';
}

// Check for errors
if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(', ', $errors)
    ]);
    exit;
}

// Prepare email
$to = CONTACT_EMAIL;
$emailSubject = "Portfolio Contact: " . $subject;
$emailBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #667eea; }
        .footer { background: #333; color: white; padding: 10px; text-align: center; border-radius: 0 0 5px 5px; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Submission</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='label'>Name:</span><br>
                {$name}
            </div>
            <div class='field'>
                <span class='label'>Email:</span><br>
                {$email}
            </div>
            <div class='field'>
                <span class='label'>Subject:</span><br>
                {$subject}
            </div>
            <div class='field'>
                <span class='label'>Message:</span><br>
                " . nl2br($message) . "
            </div>
            <div class='field'>
                <span class='label'>Sent:</span><br>
                " . date('F j, Y, g:i a') . "
            </div>
            <div class='field'>
                <span class='label'>IP Address:</span><br>
                " . $_SERVER['REMOTE_ADDR'] . "
            </div>
        </div>
        <div class='footer'>
            This email was sent from your portfolio contact form
        </div>
    </div>
</body>
</html>
";

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . SITE_NAME . ' <noreply@' . parse_url(SITE_URL, PHP_URL_HOST) . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'X-Mailer: PHP/' . phpversion()
];

// Send email and save to database
$emailSent = false;
$dbSaved = false;

try {
    $mailSent = mail($to, $emailSubject, $emailBody, implode("\r\n", $headers));
    if ($mailSent) {
        $emailSent = true;
        error_log("Contact form submitted by: {$name} ({$email})");
    }
} catch (Exception $e) {
    error_log("Email sending failed: " . $e->getMessage());
}

// Save to database
try {
    $db = getDBConnection();
    if ($db) {
        $stmt = $db->prepare("
            INSERT INTO contact_messages (name, email, subject, message, ip_address, created_at)
            VALUES (:name, :email, :subject, :message, :ip, NOW())
        ");
        
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message,
            ':ip' => $_SERVER['REMOTE_ADDR']
        ]);
        $dbSaved = true;
    }
} catch (Exception $e) {
    error_log("Database insert failed: " . $e->getMessage());
}

// Return response based on what succeeded
if ($dbSaved) {
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message! Your message has been saved successfully.' . 
                     ($emailSent ? ' I will get back to you soon.' : ' (Email notification requires mail server configuration)')
    ]);
} else if ($emailSent) {
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message! I will get back to you soon.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send message. Please try again later or contact me directly at ' . CONTACT_EMAIL
    ]);
}
?>
