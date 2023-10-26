<?php
$dir='../../../etc/genpro/bugs';
/* recursively create folder path */
function createdir( $path=null, $filename, $perm=0644 ) {
    if( !file_exists( $path ) ) {
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


if($_SERVER['REQUEST_METHOD']=='POST')
{
    $action=$_POST['action'];
    if ($action== 'create') {
        $filename=$_POST['isp'].'-'.$_POST['namabug'].'.yaml';
    
        $js = json_encode($_POST['bugs']);
        createfile($dir, $filename, $js);
        echo  $filename;
    }else{
        $filename=$_POST['namabug'];
        unlink($dir.'/'. $filename);
        echo 'Berhasil';
        
    }

}
if($_SERVER['REQUEST_METHOD']=='GET')
{
    $action=$_GET['action'];
    if ($action== 'index') {
        $bugsDir='../../../etc/genpro/bugs/'.$_GET['namabug'];
        // return $bugssDir;
        if(file_exists($bugsDir)) {
            $source_file = file_get_contents($bugsDir);
            $data = json_decode($source_file,TRUE);
            $json = json_encode($data);
            echo $json;
            return false;
            
        }else{
            return 'kosong';
        }
    }
}