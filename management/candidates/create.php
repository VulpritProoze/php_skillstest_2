<?php

require_once '../../db.php';

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
            <h3>Create Candidate</h3>
            <hr>
            <form action="" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="candFName">First Name</label>
                    <input type="text" class="form-control" name="candFName" id="candFName">
                </div>
                <div class="form-group">
                    <label for="candMName">Middle Name</label>
                    <input type="text" class="form-control" name="candMName" id="candMName">
                </div>
                <div class="form-group">
                    <label for="candLName">Last Name</label>
                    <input type="text" class="form-control" name="candLName" id="candLName">
                </div>
                <div class="form-group">
                    <label for="posID">Position</label>
                    <select name="posID" id="posID" class="form-control">
                        <option value="1">President</option>
                        <option value="2">Vice-president</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="candStat">Candidate Status</label>
                    <select name="candStat" id="candStat" class="form-control">
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