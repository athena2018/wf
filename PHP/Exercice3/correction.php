<?php 

$aResult = 0;
$bResult = 0;

foreach($input as $time) {
    list($a, $b) = $time; // list[1,3]
    
    if ($a > $b) {
        $aResult++;
    } else if ($b > $a) {
        $bResult++;
    }
}

if ($aResult > $bResult) {
    $winner = 'A';
} else {
    $winner = 'B';
}
