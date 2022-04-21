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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM schooldetails";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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
    <td><fieldset> 
      <legend style="margin-left:50%;" >School details</legend>
      <p><center>
        
        
      </center></p>
      <table border="1" width="100%" style="border-collapse:collapse">
        <tr style="font-weight:bold; text-transform:uppercase" >
          <td>school ID</td>
          <td>school name</td>
          <td>schooln address</td>
          <td>logo</td>
          <td>nearest Town</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['schoolID']; ?></td>
            <td><?php echo $row_Recordset1['schoolname']; ?></td>
            <td><?php echo $row_Recordset1['schooladdress']; ?></td>
            <td><?php echo $row_Recordset1['logo']; ?></td>
            <td><?php echo $row_Recordset1['nearestTown']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
    
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
