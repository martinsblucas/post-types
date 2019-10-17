<?php
$_GET['page'] ? $page = $_GET['page'] : $page = null;
$_GET['id'] ? $id = $_GET['id'] : $id = null;
if($page == 'add') {
    include (__DIR__.'/add.php');
}
elseif($page == 'edit' && $id) {
    include (__DIR__.'/edit.php');
}
else {
    include (__DIR__.'/all.php');
}