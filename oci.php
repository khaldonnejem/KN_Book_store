<?php

$conn = oci_connect('khaldon', 'khaldon', '//localhost/orclpdb');

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}else{
    // echo 'connected';
}

?>