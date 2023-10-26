<script src="dist/js/servers.js"></script>
<!-- <script src="dist/js/server.js"></script> -->
<div class="container mb-5">
    <h2>INSERT SERVERS</h2><br><br>
    <div class="row mb-5">
        <div class="col-md-6 ">
            <div class="row">
                <label for="inputEmail4" class="form-label">CREATE SERVER</label>
                <div class="col-md-4 mt-1">
                    <!-- <label for="inputEmail4" class="form-label">Nama</label> -->
                    <input type="text" class="form-control" id="inputName" onkeypress="return validate(event)"
                        placeholder="Name:DigitalOcean">
                </div>
                <div class="col-md-8 mt-1">
                    <!-- <label for="inputEmail4" class="form-label">Nama</label> -->
                    <input type="text" class="form-control" id="inputPassword"
                        placeholder="Password:/UUID (04216020-ad3160204-11ed-9527********)">
                </div>
                <div class="col-md-6  mt-3">
                    <!-- <label for="inputEmail4" class="form-label">Nama</label> -->
                    <input type="text" class="form-control" id="inputServer" placeholder="Server : server.com">
                </div>
                <div class="col-md-3 mt-3">
                    <!-- <label for="inputEmail4" class="form-label">Config Type</label> -->
                    <select id="inputType" class="form-select server-type">
                        <option value="all" disabled selected>Type</option>
                        <option value="trojan">TROJAN</option>
                        <!-- <option value="vmess">VMESS</option>
                        <option value="Vless">VLESS</option> -->
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <!-- <label for="inputEmail4" class="form-label">Nama</label> -->
                    <input type="text" class="form-control" id="inputPath" placeholder="Path/">
                </div>
            </div>
            <div class="col-12 mt-2  pull-right">
                <label for="bug" class="form-label"></label><br>
                <button onclick="serversCreate()" id="save" class="btn btn-success  mt-1 pull-right">SAVE</i></button>
            </div>
            <label for="inputEmail4" class="form-label" style="margin-bottom:-5px;">SERVERS LIST</label>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                            $svGroup = '';
                            foreach ($modelservers as $file) { 
                                $filePath = $dirservers . '/' . $file;
                                if (is_file($filePath)) {
                                    $cek = explode("-", str_replace('.yaml', '', $file));
                                
                                    if ($cek[0] == 'trojan') {
                                    
                                            $sv= '<button class="btn btn-primary  mt-1 mr-1 select-servers" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'vmess'){
                                        
                                            $sv= '<button class="btn btn-danger  mt-1 mr-1 select-servers" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }
                                    if ($svGroup != $cek[0]) {
                                        echo '<br>SERVER '.strtoupper($cek[0]).'<br>';
                                        echo $sv;
                                    } else {
                                        echo $sv;
                                    }
                                    $svGroup = $cek[0];
                                    
                                }
                            }?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <input type="hidden" id="nameserver">
            <label for="inputPassword4" class="form-label">Server Check</label>
            <textarea class="form-control proxy-area" disabled rows="17" id="serversupdate" name="codenya"
                placeholder="Server View"></textarea>
            <div class="mt-2 mb-2 pull-right">
                <a class="btn btn-warning  mt-1" href="/genpro/?page=insert-server">RESET</a>
                <button onclick="serversDelete()" class="btn btn-primary" <i class="fa fa-trash"
                    aria-hidden="true"></i><i class="fa fa-trash" aria-hidden="true"></i> DELETE</button>
            </div>
        </div>

    </div>

</div>