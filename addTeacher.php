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
  $insertSQL = sprintf("INSERT INTO teacher (teacherno, tscno, teachername, subjectcode, initials) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['teacherno'], "text"),
                       GetSQLValueString($_POST['tscno'], "text"),
                       GetSQLValueString($_POST['teachername'], "text"),
                       GetSQLValueString($_POST['subjectcode'], "text"),
                       GetSQLValueString($_POST['initials'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
}

mysql_select_db($database_connection, $connection);
$query_Recordset1 = "SELECT subjectcode FROM subject";
$Recordset1 = mysql_query($query_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
    <td><fieldset> <legend style="margin-left:50%;" >Teachers Details</legend>
        <p>&nbsp;</p>
        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <table align="center">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Teacher no:</td>
              <td><input type="text" name="teacherno" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Tsc no:</td>
              <td><input type="text" name="tscno" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Teacher's name:</td>
              <td><input type="text" name="teachername" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Subject code:</td>
              <td><select name="subjectcode" style="width:261px;">
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset1['subjectcode']?>"><?php echo $row_Recordset1['subjectcode']?></option>
                <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Initials:</td>
              <td><input type="text" name="initials" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="REGISTER " /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
<p><center>
        
        
    </center></p><p> </p>
        
  
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
