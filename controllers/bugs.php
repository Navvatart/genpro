<?php
/* recursively create folder path */
function createdir( $path=null, $filename, $perm=0644 ) {
    if( !file_exists( $path ) ) {
        createdir( dirname( $path ) );
        mkdir( $path, $perm, true );
        clearstatcache();
    }else {
       unlink($path.'/'. $filename);
    }
}

/* create an empty file ensuring that path is constructed */
function createfile( $path=false, $filename=false , $proxies){
    if( $path && $filename ){
        createdir( $path ,$filename);
       file_put_contents( $path . DIRECTORY_SEPARATOR . $filename, $proxies );
        return true;
    }
    return false;
}
$dir='../config/bugs';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    // var_dump($_POST);
    // die();
    $action=$_POST['action'];
    if ($action== 'create') {
     $filename=$_POST['isp'].'-'.$_POST['namabug'].'.json';
     
    //  $js= '{"'.$_POST['namabug'].'":'.json_encode($_POST['bugs']).'}';
    $js = json_encode($_POST['bugs']);
     createfile($dir, $filename, $js);
     echo  $filename;
    }else{
     $filename=$_POST['namabug'];
    //  echo $filename;
    //  die();
     unlink($dir.'/'. $filename.'.json');
     echo 'Berhasil';
         
     }

}