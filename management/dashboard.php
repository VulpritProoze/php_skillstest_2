<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Management Dashboard | Voting System</title>
    <style>
        .text1 {
            padding-left: 15px;
            padding-top: 15px;
            padding-bottom: 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card bg-base-100 w-half">
            <div class="flex flex-col">
                <a href="../index.php"><- Logout</a>
                <h3 class="">Management Dashboard</h3>
                <hr>
                <span class="text1">Navigate to various admin modules.</span>
                <ul>
                    <li>
                        <a href="voters/view.php">Voters Table</a>
                    </li>
                    <li>
                        <a href="positions/view.php">Positions Table</a>
                    </li>
                    <li>
                        <a href="candidates/view.php">Candidates Table</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>