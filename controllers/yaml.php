<?php

/* recursively create folder path */
function createdir( $path=null, $filename, $perm=0644 ) {
    // echo 'createdir';
    if( !file_exists( $path ) ) {
        createdir( dirname( $path ) );
        mkdir( $path, $perm, true );
        clearstatcache();
    }else {
        // echo $path.'/'. $filename;
        // die();
        unlink($path.'/'. $filename);
    }
}

/* create an empty file ensuring that path is constructed */
function createfile( $path=false, $filename=false , $proxies){
    // echo 'createfile->';
    if( $path && $filename ){
        createdir( $path ,$filename);
       file_put_contents( $path . DIRECTORY_SEPARATOR . $filename, $proxies );
        return true;
    }
    return false;
}


$dir='/../../etc/openclash/proxy_provider';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $filename=$_POST['fileyaml'];
    // echo $filename;
    // die();
    $proxies = $_POST['codenya'];
    createfile($dir, $filename, $proxies);
    // echo 'post ';
    // die();
     return 'sukses';
    
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
 header('Location: ' . $_SERVER['HTTP_REFERER']);
 exit;

?>