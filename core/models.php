<?php

require_once 'dbConfig.php';

function insertIntoTable($pdo, $first_name, $last_name, $age, $years_of_experience, $country_of_origin) {
    $response = array();
    $sql = "INSERT INTO registered (first_name, last_name, age, years_of_experience, country_of_origin) VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$first_name, $last_name, $age, $years_of_experience, $country_of_origin])){
        $response = array(
            "status" => "200",
            "message" => "User successfully recorded!"
        );
    }

    else {
        $response = array(
            "status" => "400",
            "message" => "An error occured with the query!"
        );
    }
    return $response;
}



function seeAllRecords($pdo){
    $sql = "select * from registered";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return [
            "message" => "Records retrieved successfully",
            "statusCode" => 200,
            "querySet" => $stmt->fetchAll(PDO::FETCH_ASSOC)
        ];
    }
    return true;
}


function getById($pdo, $id){
    $sql = "SELECT * from registered WHERE id =?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])){
        return $stmt->fetch();
    }
}

function updateUser($pdo,$id, $first_name, $last_name, $age, $years_of_experience, $country_of_origin) {

    $sql = "UPDATE registered
        SET first_name = ?, 
            last_name = ?, 
            age = ?, 
            years_of_experience = ?, 
            country_of_origin = ?
        WHERE id = ?"; 
        
    $stmt = $pdo->prepare($sql);

    if($stmt->execute([$first_name, $last_name, $age, $years_of_experience, $country_of_origin, $id ])){
        $response = array(
            "status" => "200",
            "message" => "Record updated!"
        );
    }

    else {
        $response = array(
            "status" => "400",
            "message" => "An error occured with the query!"
        );
    }
    return $response;
}

function deleteUser($pdo, $id){
    $sql = "DELETE FROM registered WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$id])){
        $response = array(
            "status" => "200",
            "message" => "Record deleted!"
        );
    }

    else {
        $response = array(
            "status" => "400",
            "message" => "An error occured with the query!"
        );
    }
    return $response;
}

function searchApplicants($pdo, $searchTerm) {
    $sql = "SELECT * FROM registered WHERE 
			CONCAT(first_name,last_name,age,years_of_experience,
				country_of_origin,created_at) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchTerm."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

?>