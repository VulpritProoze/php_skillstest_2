<?php

require_once '../../db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Voters Management | Voting System</title>
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
            <a href="../dashboard.php"><- Back to Dashboard</a>
            <h3>Voters Management</h3>
            <form action="" class="pb-10">
                <input type="text" class="form-control" name="search" id="search">
                <button class="btn mt-6">Search</button>
            </form>
            <hr>
            <div class="table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Voter Status</th>
                            <th>Voted?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ram Railey</td>
                            <td>Baratas</td>
                            <td>Alin</td>
                            <td>Active</td>
                            <td>No</td>
                            <td>
                                <div class="flex flex-row">
                                    <button class="btn text-xs action-btn hover-purple"
                                        onclick="window.location.href='edit.php?voterID=1'"
                                        >Edit</button>
                                    <button class="btn text-xs action-btn hover-red">Delete</button>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn custom-btn" onclick="window.location.href='./create.php'">Create New Voter (+)</button>
        </div>
    </div>
</body>

</html>