<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();
/*
$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.125)(PORT = 1521)) 
(CONNECT_DATA = 
(SERVER = DEDICATED) 
(SERVICE_NAME = SAVCOPC ) 
(INSTANCE_NAME = )))";

$conn = oci_connect("ISM3","ISM3",$dbstr);
if($conn){
	print 'Successfully connected to Oracle Database!';
}else{
	$errmsg = oci_error();
    print 'Oracle connection failed' . $errmsg['message'];
}
oci_close($conn);
*/
/* DATABASE CONFIGURATION */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'banana');
define("BASE_URL", "http://localhost/PHP-Slim-Restful/api/");
// define("SITE_KEY", 'yourSecretKey');
function getDBtest() 
{
	// $dbhost=DB_SERVER;
	// $dbuser=DB_USERNAME;
	// $dbpass=DB_PASSWORD;
	// $dbname=DB_DATABASE;
	// $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	// $dbConnection->exec("set names utf8");
	// $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// return $dbConnection;

	$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.125)(PORT = 1521)) 
			(CONNECT_DATA = 
			(SERVER = DEDICATED) 
			(SERVICE_NAME = SAVCOPC ) 
			(INSTANCE_NAME = )))";

			$conn = oci_connect("ISM3","ISM3",$dbstr);
			if($conn){
				return 'Successfully connected to Oracle Database!';
			}else{
				$errmsg = oci_error();
				return 'Oracle connection failed' . $errmsg['message'];
			}
			oci_close($conn);
			
			
			//return $conn;
}

function getDB() 
{
	// $dbhost=DB_SERVER;
	// $dbuser=DB_USERNAME;
	// $dbpass=DB_PASSWORD;
	// $dbname=DB_DATABASE;
	// $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	// $dbConnection->exec("set names utf8");
	// $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// return $dbConnection;

	$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.125)(PORT = 1521)) 
			(CONNECT_DATA = 
			(SERVER = DEDICATED) 
			(SERVICE_NAME = SAVCOPC ) 
			(INSTANCE_NAME = )))";

			$conn = oci_connect("ISM3","ISM3",$dbstr);
			return $conn;
}
/* DATABASE CONFIGURATION END */

/* API key encryption */
function apiToken($session_uid)
{
$key=md5(SITE_KEY.$session_uid);
return hash('sha256', $key);
}



?>