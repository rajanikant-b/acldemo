<?php
session_start();
if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"]))
{
  header("Location: /admin.php");
}

class Acl
{
    // return a role object with associated permissions
    public function getRoleResourcePrivilege($role_id) {
        $privilegedInfo = array();

        $sql = "SELECT res.name AS resName, p.name AS pName
                FROM role_resource_privilege as rrp
                JOIN resources as res ON rrp.resource_id = res.id
                JOIN privileges as p ON rrp.privilege_id = p.id
                WHERE rrp.role_id = $role_id";

        $data = mysql_query($sql);

        while($row = mysql_fetch_assoc($data)) {
            $privilegedInfo['resources'][$row["resName"]] = true;
            $privilegedInfo['privileges'][$row["resName"]."-".$row["pName"]] =
                true;
        }
        return $privilegedInfo;
    }
}

$acl = new Acl();
$_SESSION['privilegedInfo'] = $acl->getRoleResourcePrivilege($_SESSION['role']);

/**
 * It is method that will check whether the user has permission
 *
 * @param string $resource resource name
 * @return boolean
 */
function isResourceAllowed($resource) {
    $privilegesAvailable = $_SESSION['privilegedInfo']['resources'];

    //Checking if resource access available
    if((isset($privilegesAvailable[$resource]) &&
            (true === $privilegesAvailable[$resource]))) {
        return true;
    }
    return false;
}

/**
 * It is method that will check whether the user has permission
 *
 * @param string $resource resource name
 * @param string $permission permission type
 * @return boolean
 */
function isAllowed($resource, $privilege = '') {
    $privilegesAvailable = $_SESSION['privilegedInfo']['privileges'];
    $privilegeToCheck = $resource . "-" . $privilege;

    //Checking if all access permission or current action access permission
    if((isset($privilegesAvailable[$resource . "-" ."all"]) &&
        (true === $privilegesAvailable[$resource . "-" ."all"])) ||
        (isset($privilegesAvailable[$privilegeToCheck]) &&
        (true === $privilegesAvailable[$privilegeToCheck]))) {
        return true;
    }
    return false;
}

//Checking access for current page
$path_parts = pathinfo($_SERVER['REQUEST_URI']);
$requestedResource = $path_parts['filename'];
$requestedAction = isset($_GET['action']) ? $_GET['action'] : '';

if(!isAllowed($requestedResource, $requestedAction))
{
    $_SESSION['acl_message'] = 'Sorry! You do not have permission to access '
        . $requestedResource . ' ' .$requestedAction;
    header("Location: /dashboard.php");
}