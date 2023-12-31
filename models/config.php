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
if (file_exists($dirservers)) {
$modelservers = scandir($dirservers); 
}else{
echo 'untuk pertama kali isilah server dan bug terlebih dahulu';
}
// show bug list
$dirbugs='/../../etc/genpro/bugs';
if (file_exists($dirbugs)) {
$modelsbugs = scandir($dirbugs);
}else{
echo 'bug belum di buat/diisi!..';
}
// end sho bug list
