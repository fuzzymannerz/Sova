<?php require '../../php/dbconnect.php';

// Variables
$userID = "";
$result = "";


// Set POST variables
if( isset($_POST['userID']) ){
     $userID = $_POST['userID'];
}
if( isset($_POST['username']) ){
     $data = $_POST['username'];
     $col = "username";
}
elseif( isset($_POST['password']) ){
     $data = password_hash($_POST['password'], PASSWORD_BCRYPT);
     $col = "password";
}
elseif( isset($_POST['email']) ){
     $data = $_POST['email'];
     $col = "email";
}
elseif( isset($_POST['phrase']) ){
     $data = password_hash($_POST['phrase'], PASSWORD_BCRYPT);
     $col = "phrase";
}
elseif( isset($_POST['phone']) ){
     $data = $_POST['phone'];
     $col = "phone";
}


// Site settings
elseif( isset($_POST['sitename']) ){
     $data = $_POST['sitename'];
     $col = "sitename";
}
elseif( isset($_POST['website']) ){
     $data = $_POST['website'];
     $col = "website";
}
elseif( isset($_POST['tagline']) ){
     $data = $_POST['tagline'];
     $col = "tagline";
}
elseif( isset($_POST['phone']) ){
     $data = $_POST['phone'];
     $col = "phone";
}
elseif( isset($_POST['address']) ){
     $data = $_POST['address'];
     $col = "address";
}
elseif( isset($_POST['city']) ){
     $data = $_POST['city'];
     $col = "city";
}
elseif( isset($_POST['postcode']) ){
     $data = $_POST['postcode'];
     $col = "postcode";
}
elseif( isset($_POST['awaymsg']) ){
     $data = $_POST['awaymsg'];
     $col = "awaymsg";
}


// Check which type of data to update
if( isset($_POST['isAdmin']) ){
     storeAdminData();
}
if( isset($_POST['isSetting']) ){
     storeSiteData();
}
if( isset($_POST['isLogo']) ){
	//$logoName = preg_replace("/[^A-Z0-9._-]/i", "_",  $_FILES['logo']["name"]);
	//move_uploaded_file($_FILES['sitelogo']['tmp_name'], '../img/'.$logoName);
}
if( isset($_POST['isUser']) ){
     storeUserData();
}


// Function for if data store fails
function fail(){
	$result = "fail";
	echo $result;
	exit;
}


// Store data in the database
function storeUserData(){

	global $database, $data, $col, $userID;

	try{
		$db = $database->update("users", [ // Update in the users table
			$col => $data,                 // in the $col, the $data.
		], [
			"id" => $userID,               // where ID matches $userID
		]);
		
		// If valid result, return name of the updated column
		if (!$db == []){
			$result = $col;
			echo $result;
		}
		// or fail.
		else{
			fail();
		}
		
	}
	// If db error...
	catch(Exception $e){
		$result = $e->getMessage();
		exit;
	}
}


// Store site settings data
function storeSiteData(){

	global $database, $data, $col;

	try{
		$db = $database->update("settings", [ // Update in the settings table
			$col => $data,                    // in the $col, the $data.
		]);
		
		// If valid result, return name of the updated column
		if (!$db == []){
			echo "settings.updated";
		}
		// or fail.
		else{
			fail();
		}
		
	}
	
	// If db error...
	catch(Exception $e){
		$result = $e->getMessage();
		exit;
	}
}


// Send the final result
echo $result;
exit;


// Store admin data
function storeAdminData(){

	global $database, $data, $col, $userID;

	try{
		$db = $database->update("users", [ // Update in the users table
			$col => $data,                 // in the $col, the $data.
		], [
			"id" => $userID,               // where ID matches $userID
			"perm" => "admin"              // and user is an admin
		]);
		
		// If valid result, return name of the updated column
		if (!$db == []){
			$result = $col;
			echo $result;
		}
		// or fail.
		else{
			fail();
		}
		
	}
	// If db error...
	catch(Exception $e){
		$result = $e->getMessage();
		exit;
	}
}


// Send the final result
echo $result;
exit;