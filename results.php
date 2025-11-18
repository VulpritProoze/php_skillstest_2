<?php

require_once 'db.php';

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
    <link rel="stylesheet" href="index.css">
    <title>Election Results | Voting System</title>
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
                <a href="index.php"><- Go to Index</a>
                <h3 class="">Election Results</h3>
                <hr>
                <span class="text1">Here are the election results.</span>
                <?php 
                
                    while($row = $posResults->fetch_assoc()) {

                        $sql = "
                            SELECT *, (
                                SELECT COUNT(*)
                                FROM Votes vv
                                JOIN Candidates cc ON vv.candID = cc.candID
                                WHERE cc.candID = c.candID
                            ) AS 'totalVotesPerCand',
                            (
                                SELECT COUNT(*)
                                FROM Votes vv
                                JOIN Candidates cc ON vv.candID = cc.candID
                            ) AS 'totalVotesPerPos'
                            FROM Candidates c
                            JOIN Positions p ON c.posID = p.posID
                            WHERE p.posID = $row[posID]
                        ";
                        $candResults = $connection->query($sql);


                        echo "
                            <div class='border rounded-5 p-5 mb-6'>
                                <div class='table table-responsive'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>$row[posName]</th>
                                                <th>Total Votes</th>
                                                <th>Voting %</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        ";

                        while($candRow = $candResults->fetch_assoc()) {
                            $percent = $candRow['totalVotesPerCand'] / $candRow['totalVotesPerPos'] * 100;

                            echo "
                                        <tr>
                                            <td>$candRow[candFName] $candRow[candMName] $candRow[candLName]</td>
                                            <td>$candRow[totalVotesPerCand]</td>
                                            <td>$percent%</td>
                                        </tr>
                            ";
                        }


                        echo"
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        ";
                    }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>