<?php

require_once 'db.php';

$voterID = '';
$voterPass = '';
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$voterID = $_POST['voterID'] ?? '';
	$voterPass = $_POST['voterPass'] ?? '';

	do {
		if(empty($voterID) || empty($voterPass)) {
			$message = 'All fields are required';
			break;
		}

		$sql = "
			SELECT *
			FROM Voters
			WHERE voterID = '$voterID'
		";
		$currentRow = '';

		$results = $connection->query($sql);
		while($row = $results->fetch_assoc()) {
			$currentRow = $row;
		}

		if($results->num_rows == 0) {
			$message = 'User does not exist. Are you sure you inputted the right credentials?';
			break;
		}

		if($currentRow['voterPass'] !== $voterPass) {
			$message = 'Password is incorrect. Please try again.';
			break;
		}

		if($currentRow['voterStat'] != 'Active') {
			$message = "Account is disabled. Please contact staff";
			break;
		}

		$message = 'Login successful';
		header("Location: votation/view.php?voterID=$voterID");
		die();

	} while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Voting System</title>
</head>
<body>
	<div class="container">
		<div class="card bg-base-100 w-third">
			<div>
				<?php
					if(!empty($message)) {
						echo "
							<div class='alert'>
								<span>$message</span>
							</div>
						";
					}
				?>
				<h2>Login to Voting System</h6>
				<form method="POST">
					<div class="form-group">
						<label for="voterID">VoterID</label>
						<input class="form-control" type="text" name="voterID" id="voterID"
							value='<?php echo $voterID; ?>'
						>
					</div>
					<div class="form-group">
						<label for="voterPass">Password</label>
						<input class="form-control" type="password" name="voterPass" id="password">
					</div>
					<button class="btn float-right" type="submit">Login</button>
				</form>
				<a href="results.php">Election Results -></a>
			</div>
		</div>
	</div>
</body>
</html>