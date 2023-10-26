<?php 
// metode
// $dirmetode='config/metode';
// $metodeBug = scandir($dirmetode);  

// proxy yaml oc
$dir='/../../etc/openclash/proxy_provider';
if (file_exists($dir)) {
    $yaml = scandir($dir);
}

// server
$dirservers='/../../etc/genpro/servers';
$modelservers = scandir($dirservers); 

// show bug list
$dirbugs='/../../etc/genpro/bugs';
$modelsbugs = scandir($dirbugs);
// end sho bug list