<?php

require_once '../../db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../index.css">
    <title>Positions Management | Voting System</title>
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
            <h3>Positions Management</h3>
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
                            <th>Position Name</th>
                            <th># of Positions</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>President</td>
                            <td>1</td>
                            <td>Active</td>
                            <td>
                                <div class="flex flex-row">
                                    <button class="btn text-xs action-btn hover-purple"
                                        onclick="window.location.href='edit.php?posID=1'"
                                        >Edit</button>
                                    <button class="btn text-xs action-btn hover-red">Delete</button>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn custom-btn" onclick="window.location.href='create.php'">Create New Position (+)</button>
        </div>
    </div>
</body>

</html>