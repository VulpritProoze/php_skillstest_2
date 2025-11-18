<?php

require_once '../../db.php';

$params_id = $_GET['candID'] ?? '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $confirm = $_POST['confirm'] ?? '';

    if($confirm == '1' && !empty($params_id)) {
        $sql = "
            DELETE FROM Candidates
            WHERE candID = '$params_id'
        ";
        
        $result = $connection->query($sql);

        header('Location: view.php');
        die();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Delete Candidate | Voting System</title>
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
            <a href="view.php"><- Back to Voter Management</a>
            <h3>Delete Candidate</h3>
            <hr>
            <form method="POST" class="pb-10 pt-10">
                <span>Are you sure you want to delete this candidate?</span>
                <input type="hidden" name="confirm" value="1">
                <button class="btn">Yes</button>
            </form>
    </div>
</body>

</html>