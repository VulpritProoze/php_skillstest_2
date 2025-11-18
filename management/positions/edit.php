<?php

require_once '../../db.php';

$params_id = $_GET['posID'] ?? '';

$posName = '';
$numOfPositions = '';
$posStat = '';

$message = '';

$sql = "
    SELECT *
    FROM Positions
    WHERE posID = '$params_id'
";

$result = $connection->query($sql);
if (!$result) {
    $message = 'Invalid query';
}

// Set values to display
while($row = $result->fetch_assoc()) {
    $posName = $row['posName'];
    $numOfPositions = $row['numOfPositions'];
    $posStat = $row['posStat'];
}

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posName = $_POST['posName'] ?? '';
    $numOfPositions = $_POST['numOfPositions'] ?? '';
    $posStat = $_POST['posStat'] ?? '';

    do {
        // All fields required
        if (empty($posName) || 
            empty($numOfPositions) || 
            empty($posStat)) 
        {
            $message = 'All fields are required';
            break;
        }

        $sql = "
            UPDATE Positions 
            SET posName = '$posName', 
                numOfPositions = '$numOfPositions',
                posStat = '$posStat'
            WHERE posID = '$params_id'
        ";

        $result = $connection->query($sql);

        if (!$result) {
            $message = 'Invalid query.';
            break;
        }

        header("Location: view.php");
        die();

    } while(false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Edit Position | Voting System</title>
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
            <h3>Edit Position</h3>
            <hr>
            <form method="POST" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="posName">Position Name</label>
                    <input type="text" class="form-control" name="posName" id="posName"
                        value='<?php echo $posName; ?>'
                    >
                </div>
                <div class="form-group">
                    <label for="numOfPositions">Number of Positions</label>
                    <input type="number" class="form-control" name="numOfPositions" id="numOfPositions"
                        value='<?php echo $numOfPositions; ?>'
                    >
                </div>
                <div class="form-group">
                    <label for="posStat">Position Status</label>
                    <select name="posStat" id="posStat" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <input type="text" class="display-none" name="voted" id="voted" value="false">
                <button class="btn float-right">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>