<?php 
require_once 'core/dbConfig.php';
require_once 'core/handleForms.php';
require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
	<?php  
        if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

            if ($_SESSION['status'] == "200") {
                echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
            }

            else {
                echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";	
            }

        }
        unset($_SESSION['message']);
        unset($_SESSION['status']);
	?>
    <h1>Are you sure you want to delete this user?</h1>
	<?php $getById = getById($pdo, $_GET['id']); ?>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">

		<div class="studentContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getById['first_name']; ?></p>
			<p>Last Name: <?php echo $getById['last_name']; ?></p>
			<p>Age: <?php echo $getById['age']; ?></p>
			<p>Years of Experience: <?php echo $getById['years_of_experience']; ?></p>
			<p>Country of Origin: <?php echo $getById['country_of_origin']; ?></p>
			<input type="submit" name="deleteBtn" value="Delete">
		</div>
	</form>
</body>
</html>