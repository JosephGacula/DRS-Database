<?php
require_once 'config.inc.php';
$id = $_GET['id'];
if ($id === "" || $id === false || $id === null) {
    header('location: list_customers.php');
    exit();
}
?>
<html>
<head>
    <title>Sample PHP Database Program</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
<?php require_once 'header.inc.php'; ?>
<div>
    <h2>Show Student</h2>
    <?php
    $conn = new mysqli($servername, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT StudentID, Fname, Minitial, Lname, Email, Status, BDay FROM Student WHERE StudentID = ?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        echo "failed to prepare";
    } else {
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->bind_result($studentID, $fname, $minitial, $lname, $email, $status, $bday);
        echo "<div>";
        while ($stmt->fetch()) {
            echo "<b>Name:</b> $fname $minitial $lname<br>";
            echo "<b>Email:</b> $email<br>";
            echo "<b>Status:</b> $status<br>";
            echo "<b>Birthday:</b> $bday<br>";
        }
        echo "</div>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>