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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO subject (subjectcode, subjectname) VALUES (%s, %s)",
                       GetSQLValueString($_POST['subjectcode'], "text"),
                       GetSQLValueString($_POST['subjectname'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BUKHAYE HIGH SCHOOL| LOGIN PAGE</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
<table width="100%" border="0">
  <tr >
    <td ><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a class="MenuBarItemSubmenu" href="#">School</a>
        <ul>
          <li><a href="schoolDetails.php" title="enter new school details">Add School details</a></li>
          <li><a href="ViewschoolDetails.php">View School Details</a></li>
          <li><a href="DeleteSchool.php">Delete school details</a></li>
        </ul>
      </li>
      <li><a href="#" class="MenuBarItemSubmenu">Teachers</a>
        <ul>
          <li><a href="addTeacher.php">Add Teacher</a></li>
          <li><a href="delete.php">UnEmploy  A teacher</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="Add Subject">Subject</a>
        <ul>
          <li><a class="MenuBarItemSubmenu" href="addsubject.php">Add Subject</a>
            <ul>
              <li><a href="#">Item 3.1.1</a></li>
              <li><a href="#">Item 3.1.2</a></li>
            </ul>
          </li>
</ul>
      </li>
      <li><a href="logout.php">logout</a></li>
    </ul></td>  
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><fieldset style=" border-radius:18px"> <legend style="margin-left:50%;" >Teachers Details</legend>
        <p>&nbsp;</p>
        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <table align="center">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Subjectcode:</td>
              <td><input type="text" name="subjectcode" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Subjectname:</td>
              <td><select name="subjectname" style="width:261px">
              
              <optgroup  label="Select subject">
              
               <option> English</option>
               <option> Kiswahili</option>
                <option> Biology</option>
                 <option>Chemistry</option>
                 <option> English</option>
               <option> Kiswahili</option>
                <option> Biology</option>
                 <option>Chemistry</option>
                 <option> English</option>
               <option> Kiswahili</option>
                <option> Biology</option>
                 <option>Chemistry</option>
                 <option> English</option>
               <option> Kiswahili</option>
                <option> Biology</option>
                 <option>Chemistry</option>
                 <option> English</option>
               <option> Kiswahili</option>
                <option> Biology</option>
                 <option>Chemistry</option>
              
              
              
              </optgroup>.
              
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="Insert record" /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
<center>
    
    </center>
    
    
    
    </fieldset></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>