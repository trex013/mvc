<?php
/* 
	This static method of Connection creates an instance of a PDO 
	with the $config as the access key.
*/
class Connection
{
	public static function make($config) 
	{
		try 
		{
			return new PDO (
				$config["DBconnection"].";dbname=".$config["DBname"],
				$config["DBusername"],
				$config["DBpassword"],
				$config["DBoptions"]
			);
		} 
		catch (PDOException $e) 
		{
			echo "<script>alert('Connection Failed')</script>";
		}
	}
}

?>