<?php define('indexrun', true); require "config.php"; use Medoo\Medoo;


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
    	echo $e->getMessage();
    	exit;
	}
?>