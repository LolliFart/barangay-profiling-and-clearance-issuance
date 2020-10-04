<?php 


function sanitize($val) {
    // return preg_replace('   /\s+/i', ' ', strtolower(htmlspecialchars(stripslashes(trim($val)))));
    return preg_replace('   /\s+/i', ' ', htmlspecialchars(trim($val)));
}

?>