<?php
$dir='../../../etc/genpro/servers';
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
   

    if ($_POST['action'] == 'delete') {
        unlink($dir.'/'. $_POST['name']);
    }else{
        if ($_POST['oldname'] !== null) {
            $old=$_POST['oldname'];
            unlink($dir.'/'. $old);
            $filename=$_POST['type'].'-'.$_POST['name'].'.yaml';
        } else {
            $filename=$_POST['type'].'-'.$_POST['name'].'.yaml';
        }
    
        array_shift($_POST);
        $js = json_encode($_POST);
        createfile($dir, $filename, $js);
        echo  $filename;
    }

}
    



// if($_SERVER['REQUEST_METHOD']=='GET'){
//     // var_dump($_GET['bugs']);
//     // die();
//     $serverType= $_GET['serverSelect'];
//     $bugs= $_GET['bugs'];
//     $count = 0;
//     $dirservers='../../../etc/genpro/servers/';
//     $dirbugs='../config/bugs/';
//     $models = scandir($dirservers); 
//     $serversCombie =[];
//     if ($serverType == 'trojan' || $serverType == 'vmess') {
//         foreach($models as $server){
//             if ($server != "." && $server != "..") {
//                 $nameArr = explode('-', $server);
//                 $path= $dirservers.'/'.$serverType.'-'.$nameArr[1];
//                     if(file_exists($path)) {
//                         $source_file = file_get_contents($dirservers.'/'.$serverType.'-'.$nameArr[1]);
//                         $data = json_decode($source_file,TRUE);
//                         $serversCombie[] =$data;
//                     }
//             }
//         }
//     } else {
//         $path= $dirservers.'/'.$serverType.'.json';
//         if(file_exists($path)) {
//             $source_file = file_get_contents($dirservers.'/'.$serverType.'.json');
//             $data = json_decode($source_file,TRUE);
//             $serversCombie[] =$data;
//         }
//     }
//     if(file_exists($dirbugs.'/'.$bugs)) {
//         $source_file = file_get_contents($dirbugs.'/'.$bugs);
//         $bugslist = json_decode($source_file,TRUE);
//     }else{
//         $bugslist =[];
//     }
//     $models =[
//         'servers'=> $serversCombie,
//         'bugs'=> $bugslist
//     ];
//     $json = json_encode($models);
//     print_r($json); 
// }


if($_SERVER['REQUEST_METHOD']=='GET')
{
    $action=$_GET['action'];
    if ($action== 'index') {
        $serversDir='../../../etc/genpro/servers/'.$_GET['namaServer'];
        // return $bugssDir;
        if(file_exists($serversDir)) {
            $source_file = file_get_contents($serversDir);
            $data = json_decode($source_file,TRUE);
            $json = json_encode($data);
            echo $json;
            return false;
            
        }else{
            return 'kosong';
        }
    }else{
        $filename=$_GET['name'];
        //  echo $filename;
        //  die();
         unlink($dir.'/'. $filename.'.yaml');
         echo 'Berhasil';
    }
}