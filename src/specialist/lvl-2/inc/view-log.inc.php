<?php

if (is_file("log/".PATH_LOG)) {
    $visitedPage = file("log/".PATH_LOG);

    foreach ($visitedPage as $visit) {
        $breadCrumbs = explode('|', $visit);
        $dateTime = date('d-m-Y H:m:s', $breadCrumbs[0]);
        //$url = parse_url($breadCrumbs[2]);
        $string = "{$dateTime} --- {$breadCrumbs[1]} --- {$breadCrumbs[2]}";
        echo $string."<br>";
    }
}

