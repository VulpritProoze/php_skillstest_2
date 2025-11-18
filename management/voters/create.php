<?php

require_once '../../db.php';

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
            <h3>Create Voter</h3>
            <hr>
            <form action="" class="pt-10 pb-10">
                <div class="form-group">
                    <label for="voterPass">Voter Password</label>
                    <input type="password" class="form-control" name="voterPass" id="voterPass">
                </div>
                <div class="form-group">
                    <label for="voterPass">Voter Confirm Password</label>
                    <input type="password" class="form-control" name="voterConfirmPass" id="voterConfirmPass">
                </div>
                <div class="form-group">
                    <label for="voterPass">First Name</label>
                    <input type="text" class="form-control" name="voterFName" id="voterFName">
                </div>
                <div class="form-group">
                    <label for="voterPass">Middle Name</label>
                    <input type="text" class="form-control" name="voterMName" id="voterMName">
                </div>
                <div class="form-group">
                    <label for="voterPass">Last Name</label>
                    <input type="text" class="form-control" name="voterLName" id="voterLName">
                </div>
                <div class="form-group">
                    <label for="voterStat">Voter Status</label>
                    <select name="voterStat" id="voterStat" class="form-control">
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