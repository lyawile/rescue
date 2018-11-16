<?php
function checkHelper($aro, $aco, $action = "*"){
    App::import('Component', 'Acl');
    $acl = new AclComponent();
    return $acl->check($aro, $aco, $action);
}
