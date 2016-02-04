<?php include("includes.php");?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Welcome back <?php echo ucfirst($_SESSION['name']);?>!</h2>
      <hr/><br />
  </header>
    <h2>You are on Dashboard Page</h2>
    <?php if(isset($_SESSION['acl_message'])) { ?>
        <br /><br />
        <h2>
            <?php
                echo $_SESSION['acl_message'];
                unset($_SESSION['acl_message']);
            ?>
        </h2>
    <?php } ?>
</article>
</section>
    <section id="sidebar">
    </section>
<div class="clear"></div>

<div class="clear"></div>
    </section>
</div>
<?php
include("footer.php"); ?>