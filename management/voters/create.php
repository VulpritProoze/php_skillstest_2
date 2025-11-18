<?php

require_once '../../db.php';

$voterPass = '';
$voterConfirmPass = '';
$voterFName = '';
$voterMName = '';
$voterLName = '';
$voterStat = '';
$voted = false;

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voterPass = $_POST['voterPass'] ?? '';
    $voterConfirmPass = $_POST['voterConfirmPass'] ?? '';
    $voterFName = $_POST['voterFName'] ?? '';
    $voterMName = $_POST['voterMName'] ?? '';
    $voterLName = $_POST['voterLName'] ?? '';;
    $voterStat = $_POST['voterStat'] ?? '';

    do {
        // Validate if password and confirmPass is same
        if ($voterPass !== $voterConfirmPass) {
            $message = 'Password must match confirm password';
            break;
        }

        // All fields required
        if (empty($voterPass) || 
            empty($voterConfirmPass) || 
            empty($voterFName) || 
            empty($voterMName) ||
            empty($voterLName) ||
            empty($voterStat)) 
        {
            $message = 'All fields are required';
            break;
        }

        $sql = "
            INSERT INTO Voters (voterPass, voterFname, voterMName, voterLName, voterStat, voted)
            VALUES (
                '$voterPass',
                '$voterFName',
                '$voterMName',
                '$voterLName',
                '$voterStat',
                '$voted'
            )
        ";

        $result = $connection->query($sql);

        if (!$result) {
            $message = 'Invalid query.';
            break;
        }

        $message = "Successfully created voter!";

        // Reset
        $voterPass = '';
        $voterConfirmPass = '';
        $voterFName = '';
        $voterMName = '';
        $voterLName = '';
        $voterStat = '';
        $voted = false;
    } while(false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Create Voter | Voting System</title>
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
            <h3>Create Voter</h3>
            <hr>
            <form method="POST" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="voterPass">Voter Password</label>
                    <input type="password" class="form-control" name="voterPass" id="voterPass"
                    >
                </div>
                <div class="form-group">
                    <label for="voterConfirmPass">Voter Confirm Password</label>
                    <input type="password" class="form-control" name="voterConfirmPass" id="voterConfirmPass"
                    >
                </div>
                <div class="form-group">
                    <label for="voterFName">First Name</label>
                    <input type="text" class="form-control" name="voterFName" id="voterFName"
                        value="<?php echo $voterFName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterMName">Middle Name</label>
                    <input type="text" class="form-control" name="voterMName" id="voterMName"
                        value="<?php echo $voterMName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterLName">Last Name</label>
                    <input type="text" class="form-control" name="voterLName" id="voterLName"
                        value="<?php echo $voterLName; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="voterStat">Voter Status</label>
                    <select name="voterStat" id="voterStat" class="form-control">
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