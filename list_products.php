<?php
/**
 * Created by PhpStorm.
 * User: MKochanski
 * Date: 7/24/2018
 * Time: 3:07 PM
 */
require_once 'config.inc.php';

?>
<html>
<head>
    <title>Sample PHP Database Program</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
<?php
require_once 'header.inc.php';
?>
<div>
    <h2>Class Catalog</h2>
    <?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	// Prepare SQL
    $sql = "SELECT ClassID, CourseName FROM Class ORDER BY CourseName";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        echo "failed to prepare";
    }
    else {
		
		// Execute Statement
        $stmt->execute();
		
		// Process Results using Cursor
        $stmt->bind_result($classID, $courseName);
        while ($stmt->fetch()) {
            echo "<p>" . $courseName . "</p>";
        }
    }

    $conn->close();

    ?>
</div>
</body>
</html>
