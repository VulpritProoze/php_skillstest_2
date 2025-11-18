<?php

require_once '../../db.php';

$search = '';

$sql = "
    SELECT *
    FROM Voters
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
            FROM Voters
            WHERE voterID LIKE '%$search%'
                OR voterFName LIKE '%$search%'
                OR voterMName LIKE '%$search%'
                OR voterLName LIKE '%$search%'
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
    <title>Voters Management | Voting System</title>
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
            <h3>Voters Management</h3>
            <form method="GET" class="pb-10">
                <input type="text" class="form-control" name="search" id="search"
                    value="<?php echo $search; ?>"
                >
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
                            <th>Voter Status</th>
                            <th>Voted?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result->fetch_assoc()) {
                                $isVoted = $row['voted'] ? "Yes" : "No";
                                echo "
                                    <tr>
                                    <td>$row[voterID]</td>
                                    <td>$row[voterFName]</td>
                                    <td>$row[voterMName]</td>
                                    <td>$row[voterLName]</td>
                                    <td>$row[voterStat]</td>
                                    <td>$isVoted</td>
                                    <td>
                                        <div class='flex flex-row'>
                                            <button class='btn text-xs action-btn hover-purple'
                                                onclick='window.location.href=`edit.php?voterID=$row[voterID]`'
                                                >Edit</button>
                                            <button class='btn text-xs action-btn hover-red'
                                                onclick='window.location.href=`delete.php?voterID=$row[voterID]`'
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
            <button class="btn custom-btn" onclick="window.location.href='./create.php'">Create New Voter (+)</button>
        </div>
    </div>
</body>

</html>