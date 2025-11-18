<?php

require_once '../db.php';

$params_id = $_GET['voterID'] ?? '';
if (empty($params_id)) {
    die('Voter not logged in');
}

$sql = "
    SELECT *
    FROM Positions
";

$posResults = $connection->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Vote for your Candidates | Voting System</title>
    <style>
        .text1 {
            padding-left: 15px;
            padding-top: 15px;
            padding-bottom: 0px;
        }
        .rounded-5 {
            border-radius: 5px;
        }
        .p-5 {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card bg-base-100 w-half">
            <div class="flex flex-col">
                <a href="../index.php"><- Logout</a>
                <h3 class="">Voting Paper</h3>
                <hr>
                <span class="text1">Vote for your candidate. Navigate to each position and vote wisely.</span>
                <ul>
                    <?php 
                        while($row = $posResults->fetch_assoc()) {
                            echo "
                                <li>
                                    <a href='vote.php?posID=$row[posID]'>$row[posName] ($row[numOfPositions])</a>
                                </li>
                            ";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>