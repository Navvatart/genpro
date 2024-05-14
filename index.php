<?php include('views/layouts/header.php'); ?>


<html lang="en" data-bs-theme="dark">

<div class="container">
<?php require('models/config.php'); ?>
    <?php include('views/layouts/side.php'); ?>

    <div class="content">

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Support our work</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php include('views/donation.php'); ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="base64">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">

                    <!-- Modal body -->
                    <iframe style="width: 100%;height: 45vh;" src="/base64.php"></iframe>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <script>
        function namess() {
            var content = window.frames['coba'];
            console.log(content);
            // alert(content);
        }
        
        </script>
        <script type="text/javascript">
  function frameload(){
   var host = this.location.host;
    console.log('iframe loaded, body is: ', host);
    if(host === "192.168.1.1"){
    }else{
    document.getElementById("yacdlocal").remove();
    var div = document.getElementById("yacdonline");
    div.innerHTML = '<iframe  style="width: 100%; height:72vh" src="https://yacd-'+host+'/ui/yacd/?hostname=https://yacd-'+host+'&secret=reyre#/proxies"></iframe>';
    
    document.getElementById("oclocal").remove();
    
    }
  }
  function ocload(){
   var host = this.location.host;
    console.log('iframe loaded, body is: ', host);
    if(host === "192.168.1.1"){
    }else{
    document.getElementById("oclocal").remove();
    var div = document.getElementById("oconline");
    div.innerHTML = '<iframe  style="width: 100%; height:72vh" src="https://'+host+'/tinyfm/oceditor.php?p="></iframe>';
    
    document.getElementById("oclocal").remove();
    
    }
  }
  function terminalload(){
   var host = this.location.host;
    console.log('iframe loaded, body is: ', host);
    if(host === "192.168.1.1"){
    }else{
    document.getElementById("terminallocal").remove();
    var div = document.getElementById("terminalonline");
    div.innerHTML = '<iframe  style="width: 100%; height:72vh" src="https://terminal-'+host+'"></iframe>';
    
    document.getElementById("oclocal").remove();
    
    }
  }
</script>

        <?php

     $url = $_SERVER['REQUEST_URI']; 
     $page = !empty($_GET) ? $_GET['page'] : 'home';
 
 if ($page == "home") {
    require('views/index.php'); 
    }elseif ($page == "yard"){
        echo '<iframe onload="frameload()" id="yacdlocal"  style="width: 100%; height:72vh" src="http://192.168.1.1:9090/ui/yacd/?hostname=192.168.1.1&port=9090&secret=reyre#/proxies"></iframe><div id="yacdonline"></div>';

    
        
    }elseif($page == "base64"){
        echo '<div class="container"><iframe style="width: 100%;height: 45vh;" src="/base64.php"></iframe></div>';
    }elseif($page == "clasheditor"){
        echo '<iframe onload="ocload()" id="oclocal" style="width: 100%; height:72vh" src="http://192.168.1.1/tinyfm/oceditor.php?p="></iframe><div id="oconline"></div>';
    }elseif($page == "netdata"){
        echo '<div class="container"><iframe class="iframes" style="width: 100%; height:83vh" src="/netdata.html"></iframe></div>';
    }elseif($page == "speedtest"){
        echo '<div class="container"><iframe style="width: 100%; height:83vh" onload="namess()" id="coba" src="https://proof.ovh.net/"></iframe></div>';
    }elseif($page == "howdy"){
        echo '<iframe style="width: 100%; height:83vh;"  src="https://howdy.id/trojan-vpn/" ></iframe>';
    }elseif($page == "insert-server"){
        require('views/create-server.php');
    }
    elseif($page == "insert-bugs"){
        require('views/create-bugs.php');
    }
     elseif($page == "cloudflared"){
     require('views/cloudflared.php');
    }
     elseif($page == "terminal"){
     echo '<iframe onload="terminalload()" id="terminallocal" style="width: 100%; height:72vh" src="http://192.168.1.1:7681"></iframe><div id="terminalonline"></div>';
    }
    ?>
    </div>
</div>
<?php include('views/layouts/footer.php'); ?>

</body>

</html>
