<script src="dist/js/bugs.js"></script>
<div class="container">
    <h2>INSERT BUGS</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <label for="inputEmail4" class="form-label">Setting*</label>
                <div class="col-md-8 mt-1">
                    <label for="inputEmail4" class="form-label">Nama</label>
                    <input type="text" class="form-control" onkeypress="return validate(event)" id="namabug"
                        placeholder="example : google">
                </div>
                <div class="col-md-4 mt-1">
                    <label for="inputEmail4" class="form-label">ISP</label>
                    <select required id="isp" class="form-select">
                        <option selected disabled>Select ISP</option>
                        <option value="xl">XL</option>
                        <option value="liveon">LiveOn</option>
                        <option value="telkomsel">Telkomsel</option>
                        <option value="axis">Axis</option>
                        <option value="indosat">Indosat</option>
                        <option value="trhee">Trhee</option>
                        <option value="custom"> Custom ISP</option>
                    </select>
                </div>
            </div>

            <label for="inputPassword4" class="form-label">Bugs</label>
            <!-- <textarea class="form-control bug-area" id="bugs_area" rows="16" name="bugsarea"
                placeholder="SERANGGA"></textarea> -->

            <div style="width:100%;height:70%">
                <textarea class="form-control bug-area" id="bugs_area" style="width:100%; height:100%;"></textarea>
            </div>
            <small>Pisahkan Bug dengan menekan Enter</small>
            <div class="pull-right">
                <br>
                <button onclick="bugsCreate()" class="btn btn-success ">Save</i></button>
            </div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-12">
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
                                            $bug = '<button class="btn btn-primary  mt-1 mr-1 select-bugs" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'telkomsel'){
                                          
                                            $bug = '<button class="btn btn-danger  mt-1 mr-1 select-bugs" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'liveon'){
                                            $bug = '<button style="background-color:rebeccapurple;"  class="btn btn-danger  mt-1 mr-1 select-bugs" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }elseif($cek[0] == 'indosat'){
                                        $bug = '<button  class="btn btn-warning  mt-1 mr-1 select-bugs" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }else{
                                        $bug = '<button   class="btn btn-light  mt-1 mr-1 select-bugs" data-id="'.$file.'">'.$cek[1].'</i></button> ';
                                    }
                                   
                                    FunGroup($bugG,$cek,$bug);
                                   
                                    
                                    $bugG = $cek[0];

                                }
                            }?>


                </div>


            </div>
            <input type="hidden" id="namebug">
            <label for="inputPassword4" class="form-label">Bugs update</label>
            <textarea class="form-control proxy-area" rows="17" id="bugsupdate" name="codenya"
                placeholder="Welcome"></textarea>
            <div class="pull-right">
                <br>
                <button onclick="bugsUpdate()" class="btn btn-warning ">Update</i></button>
                <button onclick="bugsDelete()" class="btn btn-danger ">Delete</i></button>
            </div>
        </div>

    </div>

</div>