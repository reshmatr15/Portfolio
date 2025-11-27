<?php
/**
 * Database Setup Script
 * Run this file once to create the database and tables
 * Access via: http://localhost/portfolio/database/setup-database.php
 */

// Database configuration
$host = 'localhost';
$user = 'root';
$pass = '';

// Read SQL files
$schemaFile = __DIR__ . '/schema.sql';
$sampleDataFile = __DIR__ . '/sample-data.sql';

if (!file_exists($schemaFile)) {
    die("Error: schema.sql file not found!");
}

if (!file_exists($sampleDataFile)) {
    die("Error: sample-data.sql file not found!");
}

$schema = file_get_contents($schemaFile);
$sampleData = file_get_contents($sampleDataFile);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup - Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        .status {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .info {
            background: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
        }
        .step {
            padding: 10px;
            margin: 10px 0;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🗄️ Database Setup</h1>
        <p class="subtitle">Portfolio Database Installation</p>

<?php
try {
    // Connect to MySQL server (without database)
    echo "<div class='step'>📡 Connecting to MySQL server...</div>";
    $conn = new mysqli($host, $user, $pass);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    echo "<div class='status success'>✅ Connected to MySQL server successfully!</div>";
    
    // Execute schema SQL (creates database and tables)
    echo "<div class='step'>🔨 Creating database and tables...</div>";
    
    // Split SQL into individual statements
    $statements = array_filter(array_map('trim', explode(';', $schema)));
    
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            if (!$conn->multi_query($statement . ';')) {
                // Try single query if multi_query fails
                if (!$conn->query($statement . ';')) {
                    throw new Exception("Error executing statement: " . $conn->error);
                }
            }
            // Clear any results
            while ($conn->more_results() && $conn->next_result()) {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            }
        }
    }
    
    echo "<div class='status success'>✅ Database and tables created successfully!</div>";
    
    // Execute sample data SQL
    echo "<div class='step'>📝 Inserting sample data...</div>";
    
    $statements = array_filter(array_map('trim', explode(';', $sampleData)));
    
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            if (!$conn->multi_query($statement . ';')) {
                if (!$conn->query($statement . ';')) {
                    throw new Exception("Error inserting data: " . $conn->error);
                }
            }
            // Clear any results
            while ($conn->more_results() && $conn->next_result()) {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            }
        }
    }
    
    echo "<div class='status success'>✅ Sample data inserted successfully!</div>";
    
    // Verify installation
    echo "<div class='step'>🔍 Verifying installation...</div>";
    
    $conn->select_db('portfolio');
    
    $tables = ['contact_messages', 'projects', 'skills'];
    foreach ($tables as $table) {
        $result = $conn->query("SELECT COUNT(*) as count FROM $table");
        if ($result) {
            $row = $result->fetch_assoc();
            echo "<div class='info'>📊 Table <code>$table</code>: {$row['count']} records</div>";
        }
    }
    
    echo "<div class='status success'>";
    echo "<strong>🎉 Setup Complete!</strong><br><br>";
    echo "Your portfolio database has been set up successfully. You can now:<br>";
    echo "• View your portfolio at <code>http://localhost/portfolio</code><br>";
    echo "• Access phpMyAdmin to manage data<br>";
    echo "• Test the contact form<br>";
    echo "</div>";
    
    echo "<a href='../index.php' class='btn'>Go to Portfolio</a>";
    
    $conn->close();
    
} catch (Exception $e) {
    echo "<div class='status error'>";
    echo "<strong>❌ Setup Failed</strong><br><br>";
    echo "Error: " . $e->getMessage() . "<br><br>";
    echo "Please check:<br>";
    echo "• WAMP/MySQL is running<br>";
    echo "• Database credentials are correct<br>";
    echo "• You have necessary permissions<br>";
    echo "</div>";
}
?>

    </div>
</body>
</html>
