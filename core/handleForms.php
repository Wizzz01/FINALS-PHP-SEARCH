<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['submitRecord'])){
    
    $first_name =  trim($_POST['firstName']);  
    $last_name =  trim($_POST['lastName']);   
    $age =  trim($_POST['age']);
    $years_of_experience =  trim($_POST['yearsOfExperience']); 
    $country_of_origin =  trim($_POST['countryOfOrigin']); 

    if (!empty($first_name) && !empty($last_name) && 
		!empty($age) && !empty($years_of_experience) && !empty($country_of_origin)) {

            $query = insertIntoTable($pdo, $first_name, $last_name, $age, $years_of_experience, $country_of_origin );
                if ($query['status'] == '200') {
				    $_SESSION['message'] = $query['message'];
				    $_SESSION['status'] = $query['status'];
				    header("Location: ../index.php");
			    }

			    else {
				    $_SESSION['message'] = $query['message'];
				    $_SESSION['status'] = $query['status'];
				    header("Location: ../register.php");
			    }

        }
    else {
        $_SESSION['message'] = "Please make sure there are no empty input fields";
        $_SESSION['status'] = "400";
        header("Location: ../register.php");
    } 
}

if(isset($_POST['editBtn'])){
    $id =  $_GET['id'];
    $first_name =  $_POST['firstName'];  
    $last_name =  $_POST['lastName'];   
    $age =  $_POST['age'];
    $years_of_experience =  $_POST['yearsOfExperience']; 
    $country_of_origin =  $_POST['countryOfOrigin']; 

    $query = updateUser($pdo, $id, $first_name, $last_name, $age, $years_of_experience, $country_of_origin);

    if ($query['status'] == '200') {
        $_SESSION['message'] = $query['message'];
        $_SESSION['status'] = $query['status'];
        header("Location: ../database.php");
    }

    else {
        $_SESSION['message'] = $query['message'];
        $_SESSION['status'] = $query['status'];
        header("Location: ../edit.php");
    }
}


if(isset($_POST['deleteBtn'])){
    $id =  $_GET['id'];
    $query = deleteUser($pdo, $id);

    if ($query['status'] == '200') {
        $_SESSION['message'] = $query['message'];
        $_SESSION['status'] = $query['status'];
        header("Location: ../database.php");
    }

    else {
        $_SESSION['message'] = $query['message'];
        $_SESSION['status'] = $query['status'];
        header("Location: ../delete.php");
    }
}

if (isset($_GET['search'])) {
    $searchApplicants = searchApplicants($pdo, $_GET['search']);
}


?>
