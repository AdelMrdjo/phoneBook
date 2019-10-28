<html>
<head>
	<title>Phonebook</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="box">
	<div class="left"><h1>Phonebook</h1><img src="img/search.png"></div>
	<div class="right">
	<button onclick="search()" id="prvi">Search</button>
	<button onclick="insert()" id="drugi">Insert</button>
	<button onclick="remove()" id="treci">Delete</button>
	<div id="search" class="wrap">
		<div id="search">
			<form action="#" method="GET">
				<input type="text" name="criteria" autocomplete="off" placeholder="First name/Last name...">
				<input type="submit" value="Search"><br>
			</form>
		</div>
		<?php
			include 'inc/getResults.php';
		?>
	</div>
	<div id="insert" class="wrap">
		<div id="search">
			<form action="#" method="POST">
				<label>First name:<br>
				<input type="text" name="fname" autocomplete="off" placeholder="First name..."></label><br>
				<label>Lastname:<br>
				<input type="text" name="lname" autocomplete="off" placeholder="Last name..."></label><br>
				<label>Telephone:<br>
				<input type="text" name="tel" autocomplete="off" placeholder="Phone..."></label><br>
				<input type="submit" name="insert" value="Insert"><br>
			</form>
		</div>
			<?php
			if(isset($_POST['insert'])){
				if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['tel'])){
					if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])){
						$fname = trim($_POST['fname']);
						$lname = trim($_POST['lname']);
						$tel = trim($_POST['tel']);
						require 'inc/connect.php';
						$fname = mysqli_real_escape_string($conn,$fname);
						$lname = mysqli_real_escape_string($conn,$lname);
						$tel = mysqli_real_escape_string($conn,$tel);
						$query = "INSERT INTO contacts (fname, lname, tel) VALUES ('{$fname}','{$lname}','{$tel}')";
						if(mysqli_query($conn,$query) === TRUE){
							?><script>alert('You add contact <?php echo "$fname";?> successfully...')</script><?php
						}else{
							?><script>alert('Error...')</script><?php
						}
					}else{
						?><script>alert('All field must be filled...')</script><?php
					}
				}else{
					?><script>alert('All field must be filled...')</script><?php
				}
			}
			?>
	</div>
	<div id="remove" class="wrap">
		<div id="search">
			<?php
				require 'inc/connect.php';
				$query = "SELECT * FROM contacts";
				$result = mysqli_query($conn,$query);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						?>
							<div id="result">
								<a title="delete"href="inc/removeContact.php?id=<?php echo $row['id']?>">X</a>
								<p><b>Name:</b><?php echo $row['fname'] . " " . $row['lname']; ?> </p>
								<p><b>Tel: </b><?php echo $row['tel']; ?></p>
							</div>
						<?php
					}
				}else{
					echo "There is no any contacts.";
				}
			?>
		</div>
	</div>
	</div>
	</div>
	<script src="js.js" type="text/javascript"></script>
</body>
</html>