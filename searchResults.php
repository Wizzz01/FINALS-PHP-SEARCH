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
    <title>Search Results</title>
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
    <h2>Search Results</h2>

    <?php 
        $searchTerm = $_GET['search'];
        $results = searchApplicants($pdo, $searchTerm);
        if ($results) { 
    ?>
        <table style="width:50%; margin-top: 150px; margin-left: 450px; text-align: center; border: 2px solid black; border-collapse:collapse;">
    <tr style="border: 2px solid black;">
        <th style="border: 2px solid black;">First Name</th>
        <th style="border: 2px solid black;">Last Name</th>
        <th style="border: 2px solid black;">Age</th>
        <th style="border: 2px solid black;">Years of Experience</th>
        <th style="border: 2px solid black;">Country of Origin</th>
        <th style="border: 2px solid black;">Date Added</th>
    </tr>
    <?php foreach ($results as $row) { ?>
        <tr style="border: 2px solid black;">
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['first_name']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['last_name']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['age']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['years_of_experience']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['country_of_origin']; ?></td>
            <td style="border: 2px solid black; padding: 1rem;"><?php echo $row['created_at']; ?></td>
        </tr>
    <?php } ?>
</table>
    <?php } else { ?>
        <p>No results found for "<?php echo htmlspecialchars($searchTerm); ?>"</p>
    <?php } ?>
</body>
</html>
