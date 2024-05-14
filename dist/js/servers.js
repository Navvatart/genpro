const url = "/genpro/controllers/servers.php";
function serversCreate() {
    let inputname = document.getElementById("inputName").value;
    let inputpassword = document.getElementById("inputPassword").value;
    let inputserver = document.getElementById("inputServer").value;
    let inputType = document.getElementById("inputType").value;
    let inputPath = document.getElementById("inputPath").value;
    let oldname = document.getElementById("nameserver").value;
    if (Boolean(inputname && inputpassword && inputserver && inputType && inputPath)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name : inputname,
                type : inputType,
                password : inputpassword,
                path : inputPath,
                server : inputserver,
                oldname : oldname
                // action : "create"
            },
            
            success: function(data) {
                reloadPage()
                alert('behasil updated successfully')
                // console.log(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Nama atau ISP masih Kosong !!..';
    }
}
function serversIndex(data) {
    let namabug = document.getElementById("nameserver").value;
    var isp  = namabug.split("-");
    var nama  = isp[1].split(".");
    if (Boolean(data)) {
        $.ajax({
            type: "GET",
            url: url,
            data: {
                namaServer: data,
                action : "index"
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                var bugs ='';
                // var json = JSON.parse(data);
              
                document.getElementById("inputName").value = nama[0];
                document.getElementById("inputPassword").value = data.password;
                document.getElementById("inputServer").value = data.server;
                document.getElementById("inputType").value = data.type;
                document.getElementById("inputPath").value = data.path;
                bugs += `Name : `+nama[0] + `\n`;
                bugs += `Password : `+data.password + `\n`;
                bugs += `Server : `+data.server + `\n`;
                bugs += `Type : `+data.type + `\n`;
                bugs += `Path : `+data.path + `\n`;
                document.getElementById("serversupdate").value = bugs;
                document.querySelector('#save').innerHTML = 'Update';
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Bugs Kosong, harap pilih salah satu bug';
    }
}

function serversDelete() {
    // let name = document.getElementById("deskripsi").innerHTML;
    let namabug = document.getElementById("nameserver").value;
    if (Boolean(namabug)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name: namabug,
                action : "delete"
            },
            success: function(data) {
                // console.log(data);
                alert('Deleted is successful');
                reloadPage();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        alert('Harap pilih salah satu bug');
    }
}

