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
    <title>Edit User</title>
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
    <button onclick="document.location='database.php'">Return</button>

    <?php $getById = getById($pdo, $_GET['id']); ?>
    <form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <p>
            <label for="firstName">First name: </label>
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($getById['first_name']); ?>">
        </p>
        <p>
            <label for="lastName">Last name: </label>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($getById['last_name']); ?>">
        </p>
        <p>
            <label for="age">Age: </label>
            <input type="text" name="age" value="<?php echo htmlspecialchars($getById['age']); ?>">
        </p>
        <p>
            <label for="yearsOfExperience">Years of Experience: </label>
            <input type="text" name="yearsOfExperience" value="<?php echo htmlspecialchars($getById['years_of_experience']); ?>">
        </p>
        <p>
            <label for="countryOfOrigin">Country of Origin: </label>
            <input type="text" name="countryOfOrigin" value="<?php echo htmlspecialchars($getById['country_of_origin']); ?>">
        </p>
        <input type="submit" name="editBtn" value="Edit">
    </form>

    <?php if (isset($_POST['editBtn'])) { ?>
        <script>
            alert("<?php echo $_SESSION['message']; ?>");
        </script>
    <?php unset($_POST['editBtn']); } ?>
</body>
</html>
