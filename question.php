<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	//Set question number_format
	$number = (int) $_GET['n'];
	/*
	*	Get total question
	*/
		
	$query = "SELECT * FROM questions";
	
	//Get results
	
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;

	/*
	*	Get Question
	*/
	$query = "SELECT * FROM questions WHERE question_number = $number";
	//Get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$question = $result->fetch_assoc();
	
	/*
	*	Get Choices
	*/
	$query = "SELECT * FROM choices WHERE question_number = $number";
	//Get result
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	

?>
<!DOCTYPE html>
<html> 
	<head>
	<meta charset="utf-8" />
	<title>QALR TEST BY SAOE</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
		<header>
			<div class="container">
				<h1>QALR TEST</h1>
			</div>
		</header>
		<main>
			<div class="container">
				<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?> </div>
				<p classs="question">
					<?php echo $question['text'] ?>
				</p>
				<form method="post" action="process.php">
					<ul class="choices">
						<?php while($row = $choices->fetch_assoc()): ?>
						<?php// $count =1; echo $count ?>
						<li><input name="choice" type="radio" value="<?php echo $row['id']?>" /><?php echo $row['text']?></li>
						<?php //$count++; ?>
						<?php endwhile; ?>
					</ul>
					<input type="submit" value="Submit" />
					<input type="hidden" name="number" value="<?php echo $number; ?>" />
				
			</div>
		</main>
		<footer>
			<div class="container">
				Copyright &copy; 2016. QALR TEST
			</div>
		</footer>
	</body>
</html>