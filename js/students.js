/**
 * All js functionality
 */
$(function() {

});

//function to call privilege page by selected role
function getRoleInfo(){
    var selectedRole = $('#urole').val();
    window.location = 'permmanage.php?urole=' + selectedRole;
}
//functionality to set privilege
function setPrivilege(checked, roleId, resourceId, privilegeId) {
    $.ajax({
        url: "ajax.php?action=set-privilege",
        dataType: "json",
        data: {
            checked: checked,
            roleId: roleId,
            resourceId: resourceId,
            privilegeId: privilegeId
            },
        error:function() {
            alert('Failed, please try again');
        },
        success: function() {
            //alert('Privilege updated!!');
        }
    });
}