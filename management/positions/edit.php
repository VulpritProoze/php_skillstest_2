<?php

require_once '../../db.php';

$params_id = $_GET['posID'] ?? '';

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
            <h3>Edit Position</h3>
            <hr>
            <form action="" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="posName">Position Name</label>
                    <input type="text" class="form-control" name="posName" id="posName">
                </div>
                <div class="form-group">
                    <label for="numOfPositions">Number of Positions</label>
                    <input type="text" class="form-control" name="numOfPositions" id="numOfPositions">
                </div>
                <div class="form-group">
                    <label for="posStat">Position Status</label>
                    <select name="posStat" id="posStat" class="form-control">
                        <option value="Active">Active</option>
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