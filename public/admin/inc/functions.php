<?php


$userid = "";


// Get user ID from database
function getID($user){
	global $database;

	try{
			$db = $database->get('users', [
		    'id'], [
		    "username" => $user,
			]);

			if (!$db == [])
			{
				$result = $db;
				$finalresult = $result;
				echo $userid = $finalresult['id'];
			}
			else{
				echo "There has been an error.";
			}
		}
		// If there is an error with the connection...
		catch (Exception $e){
			echo $e->getMessage();
		}

}



// GET user information from the database
function dbGet($table, $return, $user){

	global $database;

	try{
		$db = $database->get($table, [
	    $return], [
	    "username" => $user,
		]);

		if (!$db == [])
		{
			$result = $db;
			$finalresult = $result[$return];

				echo $finalresult;
		}
		else{
			echo "There has been an error.";
		}
	}
	// If there is an error with the connection...
	catch (Exception $e){
		echo $e->getMessage();
	}
}


// GET site information from the database
function dbSiteGet($return){

	global $database;

	try{
		$db = $database->get('settings', [
	    $return]);

			$result = $db;
			$finalresult = $result[$return];

			// Check if value is set
			if ($finalresult == "notset" || $finalresult == "0"){
				echo "<span class=\"grey-text\">[not set]</span>";
			}
			else{
				echo $finalresult;
			}
			
	}
	// If there is an error with the connection...
	catch (Exception $e){
		echo $e->getMessage();
	}
}


// Update info in database
function dbPost($table, $update, $value, $updateID){

	global $database;
	
	// table, the changed value, WHERE is true.
	try{
		$db = $database->update($table, [
			$update => $value,
		], [
			"id" => $updateID,
		]);

		if (!$db == []) {
			$result = json_encode(array($update => $value));
			echo $result;
		}

	}
	catch(Exception $e){
		$result = $e->getMessage();
		exit;
	}
}


?>