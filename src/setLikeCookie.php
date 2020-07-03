<?php
$id = $_REQUEST['q'];
setcookie('liked_post_'.$id, 'true', time()+60*60*24*362*10, "/");
?>