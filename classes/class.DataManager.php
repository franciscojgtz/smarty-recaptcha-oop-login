<?php

require_once('class.User.php');
require_once('class.UserCheck.php');
require_once('class.HashPassword.php');

class DataManager
{
	private static function _getConnection()
	{
		static $hDB;
		
		if(isset($hDB))
		{
			return $hDB;
		}
		
		include('dbconfig.php');
		
		$dbcnx = @mysql_connect($host, $user, $pass);//connect to the database
		
		if (!$dbcnx)
		{
			throw new Exception("no connection was made!");            
			exit();//if no connection, exit
		}
		
		mysql_select_db($database, $dbcnx);//select database
		
		if (! @mysql_select_db($database) ) 
		{
			throw new Exception("no database exists!");        
			exit();//if no database, exit
		}
		
		return $dbcnx;
	}
	
	public static function checkValidUser($userEmail, $password)
	{
		$sql = "SELECT * FROM users WHERE user_email = '$userEmail' and user_pass = '$password'";
		
		$res = mysql_query($sql, DataManager::_getConnection());
		
		if(! ($res && mysql_num_rows($res)))
		{
			return "not user found";
		}
		return mysql_fetch_assoc($res);
	}
	
	public static function getUserData($userID)
	{
		$sql = "SELECT * FROM users WHERE user_id = $userID";
		$res = mysql_query($sql, DataManager::_getConnection());
		
		if(! ($res && mysql_num_rows($res)))
		{
			return "error";
			//die("Failed getting user data for user $userID");
		}
		return mysql_fetch_assoc($res);
	}
	
	public static function getUserIDByEmail($userEmail)
	{
		$sql = "SELECT user_id FROM users WHERE user_email = '$userEmail'";
		$res = mysql_query($sql, DataManager::_getConnection());
		
		if(! ($res && mysql_num_rows($res)))
		{
			return '';
			//die("Failed getting user id for user $userEmail");
		}
		return mysql_fetch_assoc($res);
	}
	
	public static function getAllUsersAsObjects()
	{
		$sql = "SELECT user_id FROM users";
		$res = mysql_query($sql, DataManager::_getConnection());
		
		if(!$res)
		{
			die("Failed getting all users");
		}
		
		if(mysql_num_rows($res))
		{
			$objs = array();
			while($row = mysql_fetch_assoc($res))
			{            
				try
				{
					$objs[] = new User($row['user_id']);
				}
				catch(Exception $e)
				{
					echo 'Message: ' . $e->getMessage();
				}
			
			}
			return $objs;
		}
		else
		{
			return array();
		}
	}    
	

	

	


}
?>
