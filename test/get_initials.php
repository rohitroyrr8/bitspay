<?php

$string = "Rohit Roy";

function initials($str) {
    $ret = '';
    foreach (explode(' ', $str) as $word)
        $ret .= strtoupper($word[0]);
    return $ret;
}

echo initials($string); // would output "PIVS"

?>
