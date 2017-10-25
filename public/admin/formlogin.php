<?php require '../../php/dbconnect.php'; if(!isset($_POST["username"])){http_response_code(404);include('../404.html');die(); exit;}

$result = "";

$username = $_POST['username'];
$hashpass = $_POST['password'];

session_start();

function fail(){
	$result = "fail";
	echo $result;
	exit;
}

// Connect to database and check responses
try{

	//Make sure passwords match and that the user has "admin" permission value in the database, if so, login!
	$getpw = $database->get('users', [
    'password'], [
    'username' => $username,
    'perm' => 'admin'
	]);

if (!$getpw == [])
{
		if (password_verify($hashpass, implode(',', $getpw)))
		{
			$_SESSION["adminlogin"] = $username;
	        $result = $username;
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

// Return the final result...
echo $result;
exit;