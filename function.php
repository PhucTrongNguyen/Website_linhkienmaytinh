<?php
function getIndex($index, $default='') {
    return isset($_GET[$index])?$_GET[$index]:$default;
}

function postIndex($index, $default='') {
    return isset($_POST[$index])?$_POST[$index]:$default;
}

function loadClass($c) {
    if (is_file("Library/$c.class.php"))
        include "Library/$c.class.php";
    else if (is_file("Controllers/$c.php"))
        include "Controllers/$c.php";
    else if (is_file("Models/$c.php"))
        include "Models/$c.php";
    else {
        echo "No class $c";
        exit;
    }

}