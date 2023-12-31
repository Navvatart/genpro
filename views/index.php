<script src="/genpro/dist/js/index.js"></script>
<?php 
// var_dump($modelsbugs)
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 p-2" style="border-right: 1px solid #333; border-radiuss:1%; margin-right:0px;">

            <div class="row">

                <div class="col-sm-8 col-md-8 col-lg-6">
                    <label for="inputEmail4" class="form-label">Server List
                    </label><br>
                    <select id="serverlist" class="form-select select-server">
                        <option value="" selected disabled>--Select--</option>

                        <?php 
                        
                $listg = '';
                foreach ($modelservers as $file) { 
                    $filePath = $dirservers . '/' . $file;
                    if (is_file($filePath)) {
                        $list =  explode("-", str_replace('.yaml', '', $file));
                        if ($listg != $list[0]) { ?>
                        <option value="<?=  $list[0]?>"><?=  $list[0]?></option>
                        <option value="<?= $file ?>"><?= '&nbsp;&nbsp;&nbsp;'. $list[1] ?>
                        </option>
                        <?php } else { ?>
                        <option value="<?= $file ?>"><?= '&nbsp;&nbsp;&nbsp;'. $list[1] ?>
                        </option>
                        <?php }
                        $listg = $list[0];
                            ?>
                        <?php 
                    } ?>

                        <?php 
                }?>
                    </select>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-2">
                    <label for="inputEmail4" class="form-label">PORT
                        <!-- <span class="text-danger">**</span> -->
                    </label></label>
                    <input type="text" class="form-control" id="port" placeholder="Port">

                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="inputEmail4" class="form-label">METODE BUG<span class="text-danger">*</span>
                    </label></label>
                    <select id="modebug" class="form-select select-mode">
                        <option value="all" selected>ALL</option>
                        <option value="gfw-sni"> GFW (SNI)</option>
                        <option value="ws-sni"> WS (SNI)</option>
                        <option value="ws-cdn"> GO/WS (CDN)</option>
                        <option value="ws-notls">WS (CDN) Non TLS</option>
                        <option value="xtls-sni"> XTLS (SNI)</option>
                        <option value="grpc-sni"> gRPC (SNI)</option>
                    </select>
                </div>

            </div>
            <label for="inputPassword4" class="form-label mt-1">Servers Format
                <span class="text-warning">**</span>
            </label>
            <textarea class="form-control server-area" rows="10" id="server_area" name="bugsarea"
                placeholder="SERVER"></textarea>
            <div class="row mt-2" styles="margin:1px;padding-bottom:10px;border: 1px solid #333; border-radius:1%;">
                <div class="col-md-12 ">
                    <?php 
                           echo $modelsbugs == true ? '<label for="inputEmail4" id="labelxl" class="form-label mt-0">Bugs<span class="text-danger">*</span>
                           </label>' :'';
                           function FunGroup($bugG,$cek,$bug){ ?>
                    <!-- <div class=" col-md-6" style="background-color: red"> -->
                    <?php if ($bugG != $cek[0]) {
                                    echo '<br>'.strtoupper($cek[0]).'<br>';
                                    echo $bug;
                                } else {
                                    echo $bug;
                                } ?>
                    <!-- </div> -->
                    <?php } 
                           $bugG = '';
                            foreach ($modelsbugs as $file) { 
                                $filePath = $dirbugs . '/' . $file;
                                if (is_file($filePath)) {
                                 $cek = explode("-", str_replace('.yaml', '', $file));
                                 
                                    if ($cek[0] == 'xl') {
                                            $bug = '<button class="btn btn-primary  mt-1 mr-1 select-bugsindex" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'telkomsel'){
                                          
                                            $bug = '<button class="btn btn-danger  mt-1 mr-1 select-bugsindex" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'liveon'){
                                            $bug = '<button style="background-color:rebeccapurple;"  class="btn btn-danger  mt-1 mr-1 select-bugsindex" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'indosat'){
                                        $bug = '<button  class="btn btn-warning  mt-1 mr-1 select-bugsindex" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }else{
                                        $bug = '<button   class="btn btn-light  mt-1 mr-1 select-bugsindex" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }
                                   
                                    FunGroup($bugG,$cek,$bug);
                                   
                                    
                                    $bugG = $cek[0];

                                }
                            }?>


                </div>
            </div>
            <BR>
            <div class="alert alert-primary P-2" role="alert">
                <small>Attantion:<br>
                    <span class="text-danger">*</span> Wajib diisi.<br>
                    <span class="text-warning">**</span> Jika punya daftar server/bug, tidak perlu mengisi<br>
                    <span class="text-success">***</span> Tidak perlu diisi</small>
            </div>
        </div>
        <div class="col-md-6" style="border-left: 1px solid #333; border-radiuss:1%;">
            <div class="row ">
                <div class="mt-2 mb-2 col-md-12 col-lg-12">
                    <label for="inputPassword4" class="form-label mt-1">Bugs<span class="text-warning">**</span></label>
                    <textarea class="form-control bug-area" id="bugsupdate" rows="10" name="bugsarea"
                        placeholder=""></textarea>
                </div>
                <div class="mt-2 mb-2 col-md-12 col-lg-12">
                    <label for="inputPassword4" class="form-label mt-1">Proxies<span
                            class="text-success">***</span></label>
                    <textarea class="form-control proxy-area mr-2" rows="10" id="text_proxy" name="codenya"
                        placeholder=""></textarea>
                </div>
            </div>


            <div class="row ">
                <div class="mt-2 mb-2 col-md-12 col-lg-6">
                    <label for="bug" class="form-label">State</label><br>
                    <!-- <button onclick="selectConfig()" class="btn btn-success  mt-1">GENERATE</i></button> -->
                    <!-- <input class="" type="submit" value="click" name="submit"> -->
                    <button onclick="copytext()" class="btn btn-success  mt-1"><i id="info">Copy
                            text</i></button>
                    <button onclick="hapus()" class="btn btn-light  mt-1">Clear</i></button>


                </div>
                <div class="col-md-12 col-lg-6 mt-2 ">
                    <div class="row">
                        <div class="col-sm-10 col-md-9 col-lg-8">
                            <label for="inputEmail4" class="form-label mt-1">Yaml diOpenClash</label><br>
                            <select id="fileyaml" class="form-select read-yaml">
                                <option value="yaml" selected>.yaml</option>
                                <?php 
                            foreach ($yaml as $file) { 
                            $filePath = $dir . '/' . $file;
                            if (is_file($filePath)) {?>

                                <option value="<?= $file ?>"><?= $file ?></option>

                                <?php }
                            }?>
                            </select>

                        </div>
                        <div class="col-sm-2 col-md-3 col-lg-4 p-1 " style="background-color:reds;">
                            <label for="inputEmail4" class="form-label"></label><br><br>
                            <button onclick="saveFile()" class="btn btn-warning  pull-rights ">ke-OC</i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
