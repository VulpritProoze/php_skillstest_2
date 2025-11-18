<?php

require_once '../../db.php';

$params_id = $_GET['voterID'] ?? '';

$voterPass = '';
$voterConfirmPass = '';
$voterFName = '';
$voterMName = '';
$voterLName = '';
$voterStat = '';
$voted = '';

$message = '';

$sql = "
    SELECT *
    FROM Voters
    WHERE Voters.voterID = $params_id
";

$result = $connection->query($sql);
if (!$result) {
    $message = 'Invalid query';
}

// Set values to display
while($row = $result->fetch_assoc()) {
    $voterFName = $row['voterFName'];
    $voterMName = $row['voterMName'];
    $voterLName = $row['voterLName'];
    $voterStat = $row['voterStat'];
    $voted = $row['voted'];
}

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voterPass = $_POST['voterPass'] ?? '';
    $voterConfirmPass = $_POST['voterConfirmPass'] ?? '';
    $voterFName = $_POST['voterFName'] ?? '';
    $voterMName = $_POST['voterMName'] ?? '';
    $voterLName = $_POST['voterLName'] ?? '';;
    $voterStat = $_POST['voterStat'] ?? '';
    $voted = $_POST['voted'];

    do {
        // Validate if password and confirmPass is same
        if ($voterPass !== $voterConfirmPass) {
            $message = 'Password must match confirm password';
            break;
        }

        // All fields required
        if (empty($voterFName) || 
            empty($voterMName) ||
            empty($voterLName) ||
            empty($voterStat))
        {
            $message = 'All fields are required';
            break;
        }

        if ($voterPass == '' && $voterConfirmPass == '') {
            $sql = "
                UPDATE Voters 
                SET voterFName = '$voterFName', 
                    voterMName = '$voterMName',
                    voterLName = '$voterLName',
                    voterStat = '$voterStat',
                    voted = '$voted'
                where voterID = '$params_id'
            ";
        } else {
            $sql = "
                UPDATE Voters 
                SET voterFName = '$voterFName', 
                    voterMName = '$voterMName',
                    voterLName = '$voterLName',
                    voterStat = '$voterStat',
                    voted = '$voted',
                    voterPass = '$voterPass'
                WHERE voterID = '$params_id'
            ";
        }

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
    <title>Edit Voter | Voting System</title>
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
            <h3>Edit Voter</h3>
            <hr>
            <form method="POST" class="pt-10 pb-10">
                <span>Leave password blank to not update it</span>
                <div class="form-group">
                    <label for="voterPass">Voter Password</label>
                    <input type="password" class="form-control" name="voterPass" id="voterPass"
                    >
                </div>
                <div class="form-group">
                    <label for="voterPass">Voter Confirm Password</label>
                    <input type="password" class="form-control" name="voterConfirmPass" id="voterConfirmPass"
                    >
                </div>
                <div class="form-group">
                    <label for="voterPass">First Name</label>
                    <input type="text" class="form-control" name="voterFName" id="voterFName"
                        value="<?php echo $voterFName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterPass">Middle Name</label>
                    <input type="text" class="form-control" name="voterMName" id="voterMName"
                        value="<?php echo $voterMName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterPass">Last Name</label>
                    <input type="text" class="form-control" name="voterLName" id="voterLName"
                        value="<?php echo $voterLName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterStat">Voter Status</label>
                    <select name="voterStat" id="voterStat" class="form-control">
                        <option value="Active" <?= ($voterStat == 'Active') ? 'selected' : '' ?>>Active</option>
                        <option value="Inactive" <?= ($voterStat == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="voted">Has voted?</label>
                    <select name="voted" id="voted" class="form-control">
                        <option value="0" <?= ($voted == 0) ? 'selected' : '' ?>>No</option>
                        <option value="1" <?= ($voted == 1) ? 'selected' : '' ?>>Yes</option>
                    </select>
                </div>
                <button class="btn float-right">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>