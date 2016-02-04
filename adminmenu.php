<section id="sidebar">
<?php
if(isResourceAllowed($requestedResource)) {
    if(isset($_SESSION["userid"]))
    {
    ?>
    <h2><?php echo ucfirst($requestedResource)?> Menu</h2>
    <ul>
        <?php
        echo isAllowed($requestedResource, 'view') ?
            '<li><a href="/' . $requestedResource.'.php?action=view">View</a></li>' : '';
        echo isAllowed($requestedResource, 'add') ?
            '<li><a href="/' . $requestedResource.'.php?action=add">Add</a></li>' : '';
        echo isAllowed($requestedResource, 'edit') ?
            '<li><a href="/' . $requestedResource.'.php?action=edit">Edit</a></li>' : '';
        echo isAllowed($requestedResource, 'delete') ?
            '<li><a href="/' . $requestedResource.'.php?action=delete">Delete</a></li>' : '';
        ?>
    </ul>
    <?php
    }
}
?>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>