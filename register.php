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
<button onclick="document.location='index.php'">Return</button>
<form action="core/handleForms.php" method ="POST">
        <p><Label for = "firstName">First Name: </Label> <input type "text" name ="firstName"></p>
        <p><Label for = "lastName">Last Name: </Label> <input type "text" name ="lastName"></p>
        <p><Label for = "age">Age: </Label> <input type "text" name ="age"></p>
        <p><Label for = "yearsOfExperience">Years of Experience: </Label> <input type "text" name ="yearsOfExperience"></p>
        <p><Label for = "countryOfOrigin">Country of origin: </Label> <input type "text" name ="countryOfOrigin"></p>
        <input type="submit" name="submitRecord" value="submit"> 
    </form>

</body>
</html>