<?php

require_once '../../db.php';

$search = '';
$message = '';

$sql = "
    SELECT *
    FROM Candidates
";

$result = $connection->query($sql);

if (!$result) {
    die("Invalid query");
}

// search
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $search = $_GET['search'] ?? '';

    if(!empty($search)) {
        $sql = "
            SELECT *
            FROM Candidates
            WHERE candID LIKE '%$search%'
                OR candFName LIKE '%$search%'
                OR candMName LIKE '%$search%'
                OR candLName LIKE '%$search%'
        ";

        $result = $connection->query($sql);
    }    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Candidate Management | Voting System</title>
    <style>
        .custom-btn {
            float: right;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card bg-base-100 w-half">
            <a href="../dashboard.php"><- Back to Dashboard</a>
            <?php
                if(!empty($message)) {
                    echo "
                        <div class='alert'>
                            <span>$message</span>
                        </div>
                    ";
                }
            ?>
            <h3>Candidate Management</h3>
            <form action="" class="pb-10">
                <input type="text" class="form-control" name="search" id="search">
                <button class="btn mt-6">Search</button>
            </form>
            <hr>
            <div class="table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result->fetch_assoc()) {
                                $sql = "
                                    SELECT p.posName
                                    FROM Positions p
                                    WHERE p.posID = '$row[posID]'
                                ";
                                $posResult = $connection->query($sql);
                                $posRowDisplay = '';
                                while($posRow = $posResult->fetch_assoc()) {
                                    $posRowDisplay = $posRow['posName'];
                                }
                                $positionDisplay  = $posRowDisplay;
                                echo "
                                    <tr>
                                        <td>$row[candID]</td>
                                        <td>$row[candFName]</td>
                                        <td>$row[candMName]</td>
                                        <td>$row[candLName]</td>
                                        <td>$positionDisplay</td>
                                        <td>$row[candStat]</td>
                                        <td>
                                            <div class='flex flex-row'>
                                                <button class='btn text-xs action-btn hover-purple'
                                                    onclick='window.location.href=`edit.php?candID=$row[candID]`'
                                                    >Edit</button>
                                                <button class='btn text-xs action-btn hover-red'
                                                    onclick='window.location.href=`delete.php?candID=$row[candID]`'
                                                    >Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="btn custom-btn" onclick="window.location.href='create.php'">Create New Candidate (+)</button>
        </div>
    </div>
</body>

</html>