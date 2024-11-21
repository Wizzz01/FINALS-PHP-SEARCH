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

<button onclick="document.location='index.php'">Return</button>
<form action="searchResults.php" method="GET" style="padding-top:2rem; padding-bottom:0;">
<input type="text" name="search" placeholder="Enter search term">
<input type="submit" value="Search">
</form>
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
<table style="width:50%; margin-top: 100px; margin-left: 450px; text-align: center; border: 2px solid black; border-collapse:collapse;">
    <tr style = "border: 2px solid black;">
        <th style = "border: 2px solid black;">ID</th>
        <th style = "border: 2px solid black;">First Name</th>
        <th style = "border: 2px solid black;">Last Name</th>  
        <th style = "border: 2px solid black;">Age</th>
        <th style = "border: 2px solid black;">Years of Experience</th>
        <th style = "border: 2px solid black;">Country of Origin</th>
        <th style = "border: 2px solid black;">Date Added</th>
    </tr>
    <?php $seeAllRecords = seeAllRecords($pdo);?>
    <?php if ($seeAllRecords['statusCode'] === 200) {
    foreach ($seeAllRecords['querySet'] as $row) { ?>
        <tr style="border: 2px solid black;">
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['id']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['first_name']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['last_name']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['age']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['years_of_experience']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['country_of_origin']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['created_at']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;">
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            </td>
            <td style="border: 2px solid black; padding: 1rem;">
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } 
} else { ?>
    <tr>
        <td colspan="9" style="text-align: center; padding: 1rem;">No records found or an error occurred.</td>
    </tr>
    <?php }?> 
</table>    
</body>
</html>