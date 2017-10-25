<?php
use Medoo\Medoo;

try {
    $database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => dbName,
	'server' => dbHost,
	'username' => dbUser,
	'password' => dbPass,
	'port' => dbPort,
	'option' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	]);
	}
	catch (Exception $e) {
    	echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.<br>Please make sure your database settings are correct in ~/php/config.php.</p>';
    	exit;
	}
?>