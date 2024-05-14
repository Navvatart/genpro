<html data-bs-theme="dark">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/genpro/dist/bootstrap-5.3.1/bootstrap.min.css" rel="stylesheet">
    <link href="/genpro/dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/genpro/dist/bootstrap-5.3.1/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/tinyfm/rootfs/www/tinyfm/jquery/jquery-3.6.1.min.js">
    </script>

    <script type="text/javascript" src="/genpro/dist/js/global.js"></script>

    <link rel="stylesheet" href="/genpro/dist/css/style.css">
</head>
<body>

<div class="container-fluid p-5 text-white text-center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Cloudflare_Logo.svg/2560px-Cloudflare_Logo.svg.png" alt="Girl in a jacket" style="width:20%;height:10%">
  <p>The Web Performance & Security Company | Setting</p> 
</div>
  
<div class="container">
  <div class="row">
   <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Token</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
   </div>
   <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
   <div class="col-8"></div>
  <div class="container mt-3 col-4">
  <h2>Button Styles</h2>
    <form method="post"> 
        <input type="submit" class="btn btn-success" name="start" value="start">
        <input type="submit" class="btn btn-success" name="status" value="Check Status">
        
    </form> 
   

    </div>
    </div>
    <div class="row">
     <?php
      
        if(isset($_POST['start'])) { 
            echo "Service ready Started<br>"; 
            $start ="/etc/init.d/cloudflared start";
            run($start);
        } 
        if(isset($_POST['status'])) { 
            echo "Status :<br>";
            $ps ="ps | grep cloudflared";
            run($ps);
        } 
    ?>
    <?php 
    
// Function to run process in background 
function run($command, $outputFile = '/dev/null') { 
    $processId = shell_exec(sprintf( 
        '%s > %s 2>&1 & echo $!', 
        $command, 
        $outputFile
    )); 
    exec($command, $output, $outputFile);   
      print_r("processID of process in background is: "
        . $processId."<br>");
    foreach($output as $item){
        echo $item."<br>";
    }
    print_r("current processID is: ".getmypid()); 
} 
  
// "sleep 5" process will run in background 
    
  
?></div>
</div>

</body>

