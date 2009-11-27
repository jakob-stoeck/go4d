<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'go4c',
	);
	var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
	);
	var $go4d = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'port' => 8889,
		'login' => 'root',
		'password' => 'root',
		'database' => 'go4c',
	);
}
?>