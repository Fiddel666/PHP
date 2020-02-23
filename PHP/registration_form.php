<?php
	if(isset($_POST['color'])) {
	
		include_once 'mysql_connection_manager.php';
		$dbMain_conn=new dbMain_conn();
		$mysqli=$dbMain_conn->create_link();
	
		include_once 'user_mngr.php';
		$u=new user_mngr($mysqli);
		$u->register($_POST['color']);
	}
	/*
	if (isset($_POST['color'])){   // if ANY of the options was checked
		echo $_POST['color'];    // echo the choice
	} else {
		echo "nothing was selected.";
	}
	*/
	
	if(isset($_POST['stat'])) {
	
		include_once 'mysql_connection_manager.php';
		$dbMain_conn = new dbMain_conn();
		$mysqli = $dbMain_conn->create_link();
	
		include_once 'user_mngr.php';
		$u = new user_mngr($mysqli);
		$result = $u->present($_POST['date_start'], $_POST['date_end']);
		
	}
?>

<html>
	<head>
		<style>
			.radio{
				display: inline-block;
				height: 30px;
				width: 80px;
				color: white;
			}
		</style>
	</head>
	
	<body>
		<form action="" method="post">
			<h1> Chose color </h1>
			
			<input type="radio" id="green" name="color" value="green" />
			<label for="green" class="radio" style="background-color:green">green</label>
			<br />
			
			<input type="radio" id="blue" name="color" value="blue" />
			<label for="blue" class="radio" style="background-color:blue">blue</label>
			<br />
			
			<input type="radio" id="red" name="color" value="red" />
			<label for="red" class="radio" style="background-color:Red">red</label>
			<br />
			
			<input type="radio" id="Magenta" name="color" value="Magenta" />
			<label for="Magenta" class="radio" style="background-color:Magenta">Magenta</label>
			<br />
			
			<input type="radio" id="OrangeRed" name="color" value="OrangeRed" />
			<label for="OrangeRed" class="radio" style="background-color:OrangeRed">OrangeRed</label>
			<br />
			
			<input type="radio" id="Navy" name="color" value="Navy" />
			<label for="Navy" class="radio" style="background-color:Navy">Navy</label>
			<br />
			
			<input type="radio" id="Sienna" name="color" value="Sienna" />
			<label for="Sienna" class="radio" style="background-color:Sienna">Sienna</label>
			<br />
			
			<input type="submit" value="chose" name="snd" />
		</form>
		<br />
		
		<form action="" method="post">
			<input type="date" id="date_start" name="date_start" value="date_start" />
			
			<input type="date" id="date_end" name="date_end" value="date_end" />
			
			<input type="submit" value="show statistics" name="stat" />
		</form>
		<?php
			if(isset($_POST['stat'])) {
				$colors = array(
								"green" => 0,
								"blue" => 0,
								"red" => 0,
								"Magenta" => 0,
								"OrangeRed" => 0,
								"Navy" => 0,
								"Sienna" => 0,
								);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$colors[$row["color"]] += 1;
						echo $colors[$row["color"]];
						echo "  date: " . $row["date"] . " color: " . $row["color"] . "<br />";
					}
					echo "<br />";
					$max = array_keys($colors, max($colors));
					echo "The most popular color is: " . $max[0];
				} else {
					echo "0 results";
				}
			}
		?>
	</body>
</html>
