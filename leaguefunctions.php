<?php

function totalPoints() {
    $weeklyPoints = array();
    for(i=1, i<=15, i++) {
        array_push($weeklyPoints, the_field('week_' . $i . '_points'));
    }

    rsort($weeklyPoints);
    
    $topFive = 0;

    for($i=0, $i < 5, $i++) {
        $topFive = $topFive + $weeklyPoints[$i];
    }

    return $topFive;
}

?>