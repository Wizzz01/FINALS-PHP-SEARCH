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
    <h2>Welcome! Please register below!</h2>
    <button style="padding:1rem; margin: 1rem; font-size: 17px; text-align: center;" onclick="document.location='register.php'">Register</button>

    <h2>Preview database</h2>
    <button style="padding:1rem; margin: 1rem; font-size: 17px; text-align: center;" onclick="document.location='database.php'">View database</button>

</body>
</html>