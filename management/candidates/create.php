<?php

require_once '../../db.php';

$candFName = '';
$candMName = '';
$candLName = '';
$posID  = '';
$candStat = '';

$message = '';

$sql = "
    SELECT p.posID, p.posName
    FROM Positions p
";
$posResults = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candFName = $_POST['candFName'] ?? '';
    $candMName = $_POST['candMName'] ?? '';
    $candLName = $_POST['candLName'] ?? '';;
    $posID = $_POST['posID'] ?? '';
    $candStat = $_POST['candStat'] ?? '';

    do {

        // All fields required
        if (empty($candFName) || 
            empty($candMName) || 
            empty($candLName) ||
            empty($posID) ||
            empty($candStat)) 
        {
            $message = 'All fields are required';
            break;
        }

        $sql = "
            INSERT INTO Candidates (candFName, candMName, candLName, posID, candStat)
            VALUES (
                '$candFName',
                '$candMName',
                '$candLName',
                '$posID',
                '$candStat'
            )
        ";

        $result = $connection->query($sql);

        if (!$result) {
            $message = 'Invalid query.';
            break;
        }

        $message = "Successfully created candidate!";

        // Reset
        $candFName = '';
        $candMName = '';
        $candLName = '';
        $posID  = '';
        $candStat = '';
    } while(false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Create Candidate | Voting System</title>
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
            <a href="view.php"><- Back to Management</a>
            <?php
                if(!empty($message)) {
                    echo "
                        <div class='alert'>
                            <span>$message</span>
                        </div>
                    ";
                }
            ?>
            <h3>Create Candidate</h3>
            <hr>
            <form method="POST" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="candFName">First Name</label>
                    <input type="text" class="form-control" name="candFName" id="candFName"
                        <?php echo $candFName; ?>
                    >
                </div>
                <div class="form-group">
                    <label for="candMName">Middle Name</label>
                    <input type="text" class="form-control" name="candMName" id="candMName"
                        <?php echo $candMName; ?>
                    >
                </div>
                <div class="form-group">
                    <label for="candLName">Last Name</label>
                    <input type="text" class="form-control" name="candLName" id="candLName"
                        <?php echo $candLName; ?>
                    >
                </div>
                <div class="form-group">
                    <label for="posID">Position</label>
                    <select name="posID" id="posID" class="form-control">
                        <?php 
                            while($row = $posResults->fetch_assoc()) {
                                echo "
                                    <option value='$row[posID]'>$row[posName]</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="candStat">Candidate Status</label>
                    <select name="candStat" id="candStat" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <button class="btn float-right">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>