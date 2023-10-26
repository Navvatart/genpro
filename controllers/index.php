<?php


$dirbugs='../../../etc/genpro/bugs';
if($_SERVER['REQUEST_METHOD']=='GET'){
    $bugs= $_GET['bugs'];
    $path= $dirbugs.'/'.$bugs;
    $request =$_GET;
    // echo $path;
    // die();
    
    if(file_exists($path)) {
        $source_file = file_get_contents($path);
        
        $data = json_decode($source_file,TRUE);
        foreach($data as $key => $bug) {
            $server =GetServers($request);
            $proxies[] =GetFormat($request,$bug,$server);
        }
        $format=[
            'bugs'=> $data,
            'proxies'=>$proxies
            ];
        $json = json_encode($format);
        echo $json;
        return $json;
        
    }else{
        echo'kosong';
    }
}else{
    $request =$_POST;
    $server =GetServers($request);
    $format = GetFormat($request, $bug =false, $server);
    $json = json_encode($format);
        echo $json;
        return false;
}

function GetServers($request){
   
    
    $serverDir='../../../etc/genpro/servers/'.$request['server'];
    // return $serversDir;
    if(file_exists($serverDir)) {
        $source_file = file_get_contents($serverDir);
       
        $data = json_decode($source_file,TRUE);
        return $data;
        
    }else{
        return 'kosong';
    }
}
function GetFormat($request,$bug,$server){
    $port = $request['port'];
    $name = $request['name'];
    require("../config/trojan.php");
    require("../config/vmess.php");
    
    $mode = $request['modebug'];
    $type = explode('-', $request['server']);
    if ($type[0] == 'trojan') {
        if ($mode == 'all'){
            comingSoon();
        }
        if ($mode == 'gfw-sni'){
            return $trojan_gfw_sni;
        }
        if ($mode == 'ws-sni'){
            return $trojan_ws_sni;
        }
        if ($mode == 'ws-cdn'){
            return $trojan_ws_cdn;
        }
        if ($mode == 'ws-notls'){
        return '';
        }
        if ($mode == 'xtls-sni'){
            return $trojan_xtls_sni;
        }
        if ($mode == 'grpc-sni'){
            return $trojan_grpc_sni;
        }
    }elseif ($type[0] == 'vmess'){

        if ($mode == 'all'){
            // $format = '$mode all';
            comingSoon();
        }
        if ($mode == 'gfw-sni'){
           return '';
        }
        if ($mode == 'ws-sni'){
            return $vmess_ws_sni;
        }
        if ($mode == 'ws-cdn'){
            return $vmess_ws_cdn;
        }
        if ($mode == 'ws-notls'){
            return $vmess_ws_notls;
        }
        if ($mode == 'grpc-sni'){
            return $vmess_grpc_sni;
        }
        if ($mode == 'xtls-sni'){
            // $format = trojan_xtls_sni(port,bug, data)
            // return $format;
            // return 'Untuk Trojan'
            return '';
        }
    }   
    

}