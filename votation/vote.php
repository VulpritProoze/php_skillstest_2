<?php

require_once '../db.php';

$posID = $_GET['posID'] ?? '';
$voterID = $_GET['voterID'] ?? '';

if (empty($posID) || empty($voterID)) {
    die('User not logged in');
}

$message = '';

$sql = "
    SELECT *
    FROM Positions
    WHERE posID = '$posID'
";

$posResults = $connection->query($sql);
$row = $posResults->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candID = $_POST['candID'] ?? '';

    do {
        // Validate if user has surpassed the voting quota per position
        $sql = "
            SELECT COUNT(*) AS 'Total Votes'
            FROM Votes
            WHERE voterID = '$voterID' AND posID = '$posID'
        ";
        $result = $connection->query($sql);
        $validate = $result->fetch_assoc();

        if ($validate['Total Votes'] >= $row['numOfPositions']) {
            $message = "You cannot vote for this position anymore. You can only vote $row[numOfPositions] times for this position";
            break;
        }

        $sql = "
            INSERT INTO Votes (candID, posID, voterID)
            VALUES (
                '$candID',
                '$posID',
                '$voterID'
            )
        ";

        $result = $connection->query($sql);

        $message = "Successfully voted!";
    } while (false);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Vote for a <?php echo $row['posName'] ?> | Voting System</title>
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
                <a href="view.php?voterID=<?php echo $voterID ?>"><- Go back to Votation Dashboard</a>
                        <?php
                        if (!empty($message)) {
                            echo "
                            <div class='alert'>
                                <span>$message</span>
                            </div>
                        ";
                        }
                        ?>
                        <h3 class="">Vote for <?php echo $row['posName'] ?></h3>
                        <hr>
                        <form method="POST" class="pt-10">
                            <div class="form-group">
                                <label for="candID">Candidate</label>
                                <select name="candID" id="candID" class="form-control">
                                    <?php
                                        $sql = "
                                            SELECT c.candID, 
                                                c.candFName, 
                                                c.candMName,
                                                c.candLName
                                            FROM Candidates c
                                            JOIN Positions p ON c.posID = p.posID
                                            WHERE c.posID = $row[posID]
                                        ";

                                        $candResults = $connection->query($sql);
                                        while ($candRow = $candResults->fetch_assoc()) {
                                            echo "
                                                <option value='$candRow[candID]'>$candRow[candFName] $candRow[candMName] $candRow[candLName]</option>
                                            ";
                                        }
                                    ?>
                                </select>
                                <button class="btn float-right mt-10">Submit</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</body>

</html>