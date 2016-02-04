<?php include("includes.php");?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">
    <article class="post">
        <header class="postheader">
            <h2>Assignment Page</h2>
            <hr/><br />
        </header>
    </article>
    <?php if('view' == $_GET['action']) { ?>
        <h2> Assignment VIEW is accessible to you.<br />
        Here goes the content .</h2>
    <?php } ?>
    <?php if('add' == $_GET['action']) { ?>
        <h2> Assignment ADD is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
    <?php if('edit' == $_GET['action']) { ?>
        <h2> Assignment EDIT is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
    <?php if('delete' == $_GET['action']) { ?>
        <h2> Assignment DELETE is accessible to you.<br />
            Here goes the content .</h2>
    <?php } ?>
</section>


<?php 
include("adminmenu.php");
include("footer.php"); ?>