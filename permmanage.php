<?php
include("includes.php");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">
    <article class="post">
        <header class="postheader">
            <h2>Privilege Manage Page</h2>
            <hr/>
        </header>
    </article>
    <div class="page-content">
        Change Roles
        <select name="urole" id="urole" onchange="getRoleInfo()">
        <?php
        try {
            $currRole = $_GET['urole'];
            $userRoleSql = "SELECT id, name FROM roles";
            $userRoleResult = mysql_query($userRoleSql);

            while($row = mysql_fetch_assoc($userRoleResult))
            {
                echo '<option value="'. $row["id"] .'"
                        '.(($row["id"] == $currRole) ? ' selected="selected" ' :
                        '').'>'. $row["name"] .' </option>';
            }
        } catch (Exception $e){
            echo $e->getMessage();
            exit;
        }
        ?>
        </select>
        <br /><br />
        <?php
        try {
            $resourceResult =  mysql_query("SELECT id, name FROM resources");
            $privilegeResult =  mysql_query("SELECT id, name FROM privileges");
            while($row = mysql_fetch_assoc($privilegeResult))
            {
                $privilegeInfo[] = $row;
            }
            $rolesPrivilegedResult =  mysql_query("SELECT role_id, resource_id,
            privilege_id FROM role_resource_privilege WHERE role_id = $currRole");
            //Fetching all privileges
            while($row = mysql_fetch_assoc($rolesPrivilegedResult))
            {
                $privileges[$row['role_id'].'-'.$row['resource_id'].'-'
                .$row['privilege_id']] = true;
            }
            //listing resources and privilegs
            while($resource = mysql_fetch_assoc($resourceResult))
            {
                echo '<p>' . ucfirst($resource['name']) . ':</p><br />';
                foreach($privilegeInfo as $privilege) {
                    echo '<input type="checkbox" '
                        . 'onclick="setPrivilege(this.checked, '.$currRole.', '
                        . $resource["id"] .', '.$privilege["id"] .')" '
                        . (isset($privileges[$currRole.'-'.$resource["id"].'-'
                            .$privilege["id"]]) ? ' checked="checked" ' : '')
                        .'/> '.$privilege['name'] .'&nbsp;&nbsp;&nbsp;';
                }
                echo '<br /><br />';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        ?>
    </div>
</section>
<?php 
include("adminmenu.php");
include("footer.php"); ?>