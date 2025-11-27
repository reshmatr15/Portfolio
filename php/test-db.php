<?php
/**
 * Quick Database Connection Test
 * Access via: http://localhost/portfolio/php/test-db.php
 */

require_once 'config.php';

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Test</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 10px 0; }
        table { width: 100%; background: white; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background: #667eea; color: white; }
    </style>
</head>
<body>
    <h1>📊 Database Connection Test</h1>

<?php
try {
    $db = getDBConnection();
    
    if (!$db) {
        throw new Exception('Database connection failed');
    }
    
    echo '<div class="success">✅ Database connection successful!</div>';
    
    // Check contact messages
    $stmt = $db->query("SELECT COUNT(*) as count FROM contact_messages");
    $result = $stmt->fetch();
    echo '<div class="info">📧 Contact Messages: ' . $result['count'] . ' records</div>';
    
    // Show recent messages
    if ($result['count'] > 0) {
        echo '<h2>Recent Contact Messages</h2>';
        $stmt = $db->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5");
        $messages = $stmt->fetchAll();
        
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th></tr>';
        foreach ($messages as $msg) {
            echo '<tr>';
            echo '<td>' . $msg['id'] . '</td>';
            echo '<td>' . htmlspecialchars($msg['name']) . '</td>';
            echo '<td>' . htmlspecialchars($msg['email']) . '</td>';
            echo '<td>' . htmlspecialchars($msg['subject']) . '</td>';
            echo '<td>' . $msg['created_at'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    // Check projects
    $stmt = $db->query("SELECT COUNT(*) as count FROM projects");
    $result = $stmt->fetch();
    echo '<div class="info">🚀 Projects: ' . $result['count'] . ' records</div>';
    
    // Check skills
    $stmt = $db->query("SELECT COUNT(*) as count FROM skills");
    $result = $stmt->fetch();
    echo '<div class="info">💡 Skills: ' . $result['count'] . ' records</div>';
    
    echo '<div class="success"><strong>Database is working perfectly!</strong><br>';
    echo 'Contact form submissions are being saved even though email sending fails on localhost.</div>';
    
} catch (Exception $e) {
    echo '<div class="error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
?>

    <p><a href="../index.php">← Back to Portfolio</a> | <a href="../admin/messages.php">View Admin Panel</a></p>
</body>
</html>
