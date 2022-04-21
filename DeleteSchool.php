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
    <td>&nbsp;</td>
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