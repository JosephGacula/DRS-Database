<?php
require_once 'config.inc.php';
?>
<html>
<head>
    <title>Sample PHP Database Program</title>
    <link rel="stylesheet" href="base.css">
    <style>
        .search-form table { border-collapse: collapse; width: 100%; max-width: 700px; }
        .search-form td { padding: 6px 10px; vertical-align: middle; }
        .search-form label { font-weight: bold; }
        .search-form input[type=text], .search-form input[type=date], .search-form select { width: 100%; padding: 5px; box-sizing: border-box; }
        .search-form button { margin-top: 10px; padding: 8px 20px; background: #333; color: white; border: none; cursor: pointer; }
        .results-table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        .results-table th, .results-table td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        .results-table th { background-color: #333; color: white; }
        .results-table tr:nth-child(even) { background-color: #f2f2f2; }
        .section-label { font-weight: bold; background-color: #eee; padding: 5px 10px; margin-top: 10px; display: block; }
        .toggle-group label { margin-right: 15px; font-weight: normal; }
        a.clear-link { margin-left: 15px; color: #333; }
    </style>
</head>
<body>
<?php require_once 'header.inc.php'; ?>
<div>
    <h2>Advanced Student Search</h2>
    <div class="search-form">
    <form method="get">

        <span class="section-label">Student Filters</span>
        <table>
            <tr>
                <td><label>First Name:</label></td>
                <td><input type="text" name="fname" value="<?= htmlspecialchars($_GET['fname'] ?? '') ?>" placeholder="e.g. Alice"></td>
            </tr>
            <tr>
                <td><label>Last Name:</label></td>
                <td><input type="text" name="lname" value="<?= htmlspecialchars($_GET['lname'] ?? '') ?>" placeholder="e.g. Brown"></td>
            </tr>
            <tr>
                <td><label>Status:</label></td>
                <td>
                    <select name="status">
                        <option value="">-- Any --</option>
                        <option value="Full-time" <?= (($_GET['status'] ?? '') === 'Full-time') ? 'selected' : '' ?>>Full-time</option>
                        <option value="Part-time" <?= (($_GET['status'] ?? '') === 'Part-time') ? 'selected' : '' ?>>Part-time</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Birthday From:</label></td>
                <td><input type="date" name="bday_from" value="<?= htmlspecialchars($_GET['bday_from'] ?? '') ?>"></td>
            </tr>
            <tr>
                <td><label>Birthday To:</label></td>
                <td><input type="date" name="bday_to" value="<?= htmlspecialchars($_GET['bday_to'] ?? '') ?>"></td>
            </tr>
        </table>

        <span class="section-label">Class Filters</span>
        <table>
            <tr>
                <td><label>Course Name:</label></td>
                <td><input type="text" name="course_name" value="<?= htmlspecialchars($_GET['course_name'] ?? '') ?>" placeholder="e.g. Data Structures"></td>
            </tr>
            <tr>
                <td><label>Learning Format:</label></td>
                <td>
                    <select name="format">
                        <option value="">-- Any --</option>
                        <option value="In-Person" <?= (($_GET['format'] ?? '') === 'In-Person') ? 'selected' : '' ?>>In-Person</option>
                        <option value="Hybrid" <?= (($_GET['format'] ?? '') === 'Hybrid') ? 'selected' : '' ?>>Hybrid</option>
                        <option value="Online" <?= (($_GET['format'] ?? '') === 'Online') ? 'selected' : '' ?>>Online</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Quarter:</label></td>
                <td>
                    <select name="quarter">
                        <option value="">-- Any --</option>
                        <option value="Fall 2026" <?= (($_GET['quarter'] ?? '') === 'Fall 2026') ? 'selected' : '' ?>>Fall 2026</option>
                        <option value="Winter 2026" <?= (($_GET['quarter'] ?? '') === 'Winter 2026') ? 'selected' : '' ?>>Winter 2026</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Has Exam:</label></td>
                <td>
                    <select name="has_exam">
                        <option value="">-- Any --</option>
                        <option value="1" <?= (($_GET['has_exam'] ?? '') === '1') ? 'selected' : '' ?>>Yes</option>
                        <option value="0" <?= (($_GET['has_exam'] ?? '') === '0') ? 'selected' : '' ?>>No</option>
                    </select>
                </td>
            </tr>
        </table>

        <span class="section-label">Accommodation Filters</span>
        <table>
            <tr>
                <td><label>Accommodation Description:</label></td>
                <td><input type="text" name="accommodation" value="<?= htmlspecialchars($_GET['accommodation'] ?? '') ?>" placeholder="e.g. Extended time"></td>
            </tr>
            <tr>
                <td><label>Disability:</label></td>
                <td><input type="text" name="disability" value="<?= htmlspecialchars($_GET['disability'] ?? '') ?>" placeholder="e.g. ADHD"></td>
            </tr>
        </table>

        <span class="section-label">Sort Settings</span>
        <table>
            <tr>
                <td><label>Sort By:</label></td>
                <td>
                    <select name="sort_by">
                        <option value="s.StudentID" <?= (($_GET['sort_by'] ?? '') === 's.StudentID') ? 'selected' : '' ?>>Student ID</option>
                        <option value="s.Lname" <?= (($_GET['sort_by'] ?? '') === 's.Lname') ? 'selected' : '' ?>>Last Name</option>
                        <option value="s.Fname" <?= (($_GET['sort_by'] ?? '') === 's.Fname') ? 'selected' : '' ?>>First Name</option>
                        <option value="s.BDay" <?= (($_GET['sort_by'] ?? '') === 's.BDay') ? 'selected' : '' ?>>Birthday</option>
                        <option value="s.Status" <?= (($_GET['sort_by'] ?? '') === 's.Status') ? 'selected' : '' ?>>Status</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Order:</label></td>
                <td>
                    <select name="sort_order">
                        <option value="ASC" <?= (($_GET['sort_order'] ?? '') === 'ASC') ? 'selected' : '' ?>>Ascending</option>
                        <option value="DESC" <?= (($_GET['sort_order'] ?? '') === 'DESC') ? 'selected' : '' ?>>Descending</option>
                    </select>
                </td>
            </tr>
        </table>

        <span class="section-label">Show Optional Columns in Results</span>
        <div class="toggle-group" style="padding: 8px 10px;">
            <label><input type="checkbox" name="show_birthday" value="1" <?= !empty($_GET['show_birthday']) ? 'checked' : '' ?>> Birthday</label>
            <label><input type="checkbox" name="show_email" value="1" <?= !empty($_GET['show_email']) ? 'checked' : '' ?>> Email</label>
            <label><input type="checkbox" name="show_accommodation" value="1" <?= !empty($_GET['show_accommodation']) ? 'checked' : '' ?>> Accommodation</label>
            <label><input type="checkbox" name="show_exam" value="1" <?= !empty($_GET['show_exam']) ? 'checked' : '' ?>> Exam Details</label>
        </div>

        <div style="padding: 8px 10px;">
            <button type="submit">Search</button>
            <a href="search.php" class="clear-link">Clear Filters</a>
        </div>
    </form>
    </div>

    <?php
    if (!empty($_GET)) {
        $conn = new mysqli($servername, $username, $password, $database, $port);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $allowed_sort = ['s.StudentID', 's.Lname', 's.Fname', 's.BDay', 's.Status'];
        $allowed_order = ['ASC', 'DESC'];
        $sort_by = in_array($_GET['sort_by'] ?? '', $allowed_sort) ? $_GET['sort_by'] : 's.StudentID';
        $sort_order = in_array($_GET['sort_order'] ?? '', $allowed_order) ? $_GET['sort_order'] : 'ASC';

        $show_birthday     = !empty($_GET['show_birthday']);
        $show_email        = !empty($_GET['show_email']);
        $show_accommodation = !empty($_GET['show_accommodation']);
        $show_exam         = !empty($_GET['show_exam']);

        // Main student query
        $sql = "SELECT DISTINCT s.StudentID, s.Fname, s.Minitial, s.Lname, s.Email, s.Status, s.BDay
                FROM Student s
                LEFT JOIN Takes t ON s.StudentID = t.StudentID
                LEFT JOIN Class c ON t.ClassID = c.ClassID
                LEFT JOIN Accommodation a ON s.StudentID = a.StudentID
                WHERE 1=1";

        $params = [];
        $types = "";

        if (!empty($_GET['fname'])) { $sql .= " AND s.Fname LIKE ?"; $params[] = "%" . $_GET['fname'] . "%"; $types .= "s"; }
        if (!empty($_GET['lname'])) { $sql .= " AND s.Lname LIKE ?"; $params[] = "%" . $_GET['lname'] . "%"; $types .= "s"; }
        if (!empty($_GET['status'])) { $sql .= " AND s.Status = ?"; $params[] = $_GET['status']; $types .= "s"; }
        if (!empty($_GET['bday_from'])) { $sql .= " AND s.BDay >= ?"; $params[] = $_GET['bday_from']; $types .= "s"; }
        if (!empty($_GET['bday_to'])) { $sql .= " AND s.BDay <= ?"; $params[] = $_GET['bday_to']; $types .= "s"; }
        if (!empty($_GET['course_name'])) { $sql .= " AND c.CourseName LIKE ?"; $params[] = "%" . $_GET['course_name'] . "%"; $types .= "s"; }
        if (!empty($_GET['format'])) { $sql .= " AND c.LearningFormat = ?"; $params[] = $_GET['format']; $types .= "s"; }
        if (!empty($_GET['quarter'])) { $sql .= " AND c.Quarter = ?"; $params[] = $_GET['quarter']; $types .= "s"; }
        if (isset($_GET['has_exam']) && $_GET['has_exam'] !== '') { $sql .= " AND c.Exam = ?"; $params[] = $_GET['has_exam']; $types .= "s"; }
        if (!empty($_GET['accommodation'])) { $sql .= " AND a.Description LIKE ?"; $params[] = "%" . $_GET['accommodation'] . "%"; $types .= "s"; }
        if (!empty($_GET['disability'])) { $sql .= " AND a.Disability LIKE ?"; $params[] = "%" . $_GET['disability'] . "%"; $types .= "s"; }

        $sql .= " ORDER BY $sort_by $sort_order";

        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            echo "failed to prepare: " . $conn->error;
        } else {
            if (!empty($params)) { $stmt->bind_param($types, ...$params); }
            $stmt->execute();
            $stmt->bind_result($studentID, $fname, $minitial, $lname, $email, $status, $bday);

            $rows = [];
            while ($stmt->fetch()) {
                $rows[] = ['id' => $studentID, 'fname' => $fname, 'mi' => $minitial, 'lname' => $lname, 'email' => $email, 'status' => $status, 'bday' => $bday];
            }
            $stmt->close();

            echo "<h3>Results</h3>";

            if (empty($rows)) {
                echo "<p><i>No students found matching your criteria.</i></p>";
            } else {
                echo "<table class='results-table'><tr>";
                echo "<th>Student ID</th><th>Name</th><th>Status</th>";
                if ($show_email) echo "<th>Email</th>";
                if ($show_birthday) echo "<th>Birthday</th>";
                if ($show_accommodation) echo "<th>Accommodation</th>";
                if ($show_exam) echo "<th>Exam Details</th>";
                echo "</tr>";

                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . " " . $row['mi'] . " " . $row['lname'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    if ($show_email) echo "<td>" . $row['email'] . "</td>";
                    if ($show_birthday) echo "<td>" . $row['bday'] . "</td>";

                    // Accommodation column
                    if ($show_accommodation) {
                        $acc_stmt = $conn->prepare("SELECT Description, Disability FROM Accommodation WHERE StudentID = ?");
                        $acc_stmt->bind_param('i', $row['id']);
                        $acc_stmt->execute();
                        $acc_stmt->bind_result($acc_desc, $acc_dis);
                        $accs = [];
                        while ($acc_stmt->fetch()) {
                            $accs[] = $acc_desc . " (" . $acc_dis . ")";
                        }
                        $acc_stmt->close();
                        echo "<td>" . (empty($accs) ? "<i>None</i>" : implode("<br>", $accs)) . "</td>";
                    }

                    // Exam details column
                    if ($show_exam) {
                        $exam_sql = "SELECT c.CourseName, e.Date, e.Time, e.Length
                                     FROM Takes t
                                     JOIN Class c ON t.ClassID = c.ClassID
                                     JOIN Exam e ON c.ClassID = e.ClassID
                                     WHERE t.StudentID = ?";
                        $exam_stmt = $conn->prepare($exam_sql);
                        $exam_stmt->bind_param('i', $row['id']);
                        $exam_stmt->execute();
                        $exam_stmt->bind_result($course, $edate, $etime, $elength);
                        $exams = [];
                        while ($exam_stmt->fetch()) {
                            $exams[] = "<b>$course</b>: $edate at $etime ($elength min)";
                        }
                        $exam_stmt->close();
                        echo "<td>" . (empty($exams) ? "<i>No exams</i>" : implode("<br>", $exams)) . "</td>";
                    }

                    echo "</tr>";
                }
                echo "</table>";
                echo "<p><b>" . count($rows) . " result(s) found.</b></p>";
            }
        }
        $conn->close();
    }
    ?>
</div>
</body>
</html>
