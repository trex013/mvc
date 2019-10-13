<?php

/* Contains the Specific credentials required to access the data base */

return [
	"database" => [
		"DBconnection" => "mysql:host=localhost",
		"DBname" => "rexchat",
		"DBusername" => "root",
		"DBpassword" => "",
		"DBoptions" => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
]

?>