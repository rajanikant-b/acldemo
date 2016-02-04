<?php
session_start();

define('BASE_URL', 'http://acl.demo.raj');

if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"]))
{
	header("Location: " . BASE_URL . "/dashboard.php");
}

include("header.php");
include("connection.php");

if(isset($_POST["username"]) && isset($_POST["pwd"]))
{
    $result = mysql_query("SELECT * FROM users WHERE username='$_POST[username]'");

    while($row = mysql_fetch_assoc($result))
    {
        $userInfo = $row;
    }

    if(isset($userInfo['password']) && (md5($_POST["pwd"]) === $userInfo['password'])) {
        $_SESSION["userid"] = $userInfo["id"];
        $_SESSION["name"] = $userInfo["name"];
        $_SESSION["role"] = $userInfo["role_id"];
        $_SESSION["email"] = $userInfo["email"];
        header("Location: " . BASE_URL . "/dashboard.php");
    } else {
        $log =  "Login failed.. Please try again..";
    }
}
?>
<section id="page">
    <header id="pageheader" class="normalheader">
        <h2 class="sitedescription"></h2>
    </header>
    <section id="contents">
    <article class="post">
        <header class="postheader">
            <h2><u>User Login</u></h2>
            <h2><?php echo $log;?></h2>
        </header>
      <section class="entry">
        <form action="admin.php" method="post" class="form">
        <p class="textfield">
          <label for="author">
             <small>Username (required)</small>
          </label>
           <input name="username" id="uid" value="" size="22" tabindex="1" type="text">
       </p>
       <p class="textfield">
           <label for="email">
              <small>Password (required)</small>
           </label>
           <input name="pwd" id="pwd" value="" size="22" tabindex="2" type="password">
       </p>
       <p>
         <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png">
       </p>
       <div class="clear"></div>
    </form>
    </section>
    </article>
</section>

<?php 
include("adminmenu.php");
include("footer.php"); ?>