
<!doctype html>

<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Student Information System</title>

<link href="style.css" rel="stylesheet" type="text/css">
<link href="styles/print/main.css" rel="stylesheet" type="text/css" media="print">
<script src="js/jquery.js"></script>
<script src="js/students.js"></script>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<div id="wrap">

<section id="top">
<nav id="mainnav">
<h1 id="sitename" class="logotext">
<a href="admin.php">ACL DEMO</a>
</h1>
<ul>

<?php
session_start();
if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"]))
{
?>
	<li><a href="admin.php"><span>Login</span></a></li>
<?php } else { ?>
	<?php if(isResourceAllowed('permmanage')) { ?>
		<li><a href="permmanage.php?urole=1">
			<span>Manage Privilege</span></a></li>
	<?php } if(isResourceAllowed('users')) { ?>
	    <li><a href="users.php?action=view"><span>users</span></a></li>
    <?php } if(isResourceAllowed('assignments')) { ?>
	    <li><a href="assignments.php?action=view"><span>Assignments</span></a></li>
    <?php } ?>
	<li><a href="logout.php"><span>Logout</span></a></li>
<?php } ?>
</ul>

</nav>
</section>