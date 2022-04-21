<?php require_once('Connections/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "schoolDetails.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connection, $connection);
  
  $LoginRS__query=sprintf("SELECT username, pword FROM users WHERE username=%s AND pword=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
	  
	  
	   echo '<script>alert("user of this account does not exist")</script>';
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BUKHAYE HIGH SCHOOL| LOGIN PAGE</title>
</head>

<body>
<table width="100%" border="0" style="background-color:blue">
  <tr>
    <td>
    <center>
      <img src="KIbabii-Logo.png" width="100" height="100" alt="logo" />
      <h3 style="color:white; font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif">BUKHAYE HIGH SCHOOL IMS</h3>
      
      
      

    </center>
    
    
    </td>
  </tr>
</table>
<hr  size="3" color="gold"/>
<form ACTION="<?php echo $loginFormAction; ?>" method="POST">
<table width="100%" border="0">
  <tr >
    <td > 
   
   
    <center>
    <fieldset> <legend style="margin-left:50%;" >LOGIN HERE</legend>
    
    <center>
    <table>
    
    <tr>
    <td><label>USERNAME :</label></td>
    <td><input type="text"  size="32" name="username"/></td>
    
    </tr>
    
    
     <tr>
     <td><label>Password :</label></td>
    <td><input type="password"  size="32" name="pass"/></td>
    
    </tr>
    
     <tr>
    <td>
    
    </td>
    <td> <input type="submit"  size="32" name="btnLogin"/> &nbsp;    
    <input type="reset"  size="32" name="btnReset"/><td> 
    
    </tr>
    
    
    
    
    
    </table>
    </center>
    
    </fieldset>
    
    </center>
    
    </td>  
  </tr>
</table>
 </form>
</table>
<table width="100%" border="0" style=" bottom:0; position:fixed; ">
  <tr>
    <td><center>
    
    <img src="ISO-2015-Certification.jpg" /> &copy;
    BUKHAYE HIGH SCHOOL .All Rights Reserved 
    </center></td>
  </tr>
</table>
</body>
</html>