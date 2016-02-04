<?php include("includes.php");?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">
    <article class="post">
        <header class="postheader">
            <h2>Users Page</h2>
            <hr/><br />
        </header>
    </article>
    <?php if('view' == $_GET['action']) { ?>
        <h2> Users VIEW is accessible to you.<br />
        Here goes the content .</h2>
    <?php } ?>
    <?php if('add' == $_GET['action']) { ?>
        <h2> Users ADD is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
    <?php if('edit' == $_GET['action']) { ?>
        <h2> Users EDIT is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
    <?php if('delete' == $_GET['action']) { ?>
        <h2> Users DELETE is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
</section>
<?php 
include("adminmenu.php");
include("footer.php"); ?>