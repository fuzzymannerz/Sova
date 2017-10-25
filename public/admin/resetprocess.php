<?php require '../../php/dbconnect.php'; if(!isset($_POST["phrase"])){http_response_code(404);include('../404.html');die(); exit;}

$result = "";
$isTempPass = false;

$username = $_POST['username'];
$email = $_POST['email'];
$phrase = $_POST['phrase'];

function fail(){
	$result = "fail";
	echo $result;
	exit;
}

// Connect to database and check responses
try{

	//Make sure users email address exists and is an admin
	$getresults = $database->get('users', [
		'phrase'], [
		'username' => $username,
		'email' => $email,
		'perm' => 'admin'
		]);

	if (!$getresults == [])
	{
		if (password_verify($phrase, implode(',', $getresults)))
		{
			generateTempPass();
		}
		else{
			fail();
		}
	}
	else{
		fail();
	}

}
// If there is an error with the connection...
catch (Exception $e) {
	$result = $e->getMessage();
	echo $result;
	exit;
}


// Create an temporary 10 character password
function generateTempPass(){
	$gen = md5(time() . rand());
	$gen = substr($gen, 0, -22);
	storePass($gen);
}

// Store the temporary password in the database
function storePass($password){

	global $database, $username, $email, $isTempPass;
	// table, the changed value, WHERE is true.
	try{
		$data = $database->update("users", [
			"password" => password_hash($password, PASSWORD_BCRYPT),
		], [
			"username" => $username,
			"email" => $email
		]);
		// Send the password and temporary status back (Temp status is used when the user logs in, to remind them to change the password)
		$isTempPass = true;
		$result = $password;
		echo $result;
	}
	catch(Exception $e){
		$result = $e->getMessage();
		exit;
	}
}

// Return the final result...
echo $result;
exit;