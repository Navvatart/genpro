function serversCreate() {
   
    let inputname = document.getElementById("inputName").value;
    let inputpassword = document.getElementById("inputPassword").value;
    let inputserver = document.getElementById("inputServer").value;
    let inputType = document.getElementById("inputType").value;
    let inputPath = document.getElementById("inputPath").value;
    const servers = [
        inputname,inputpassword,inputType,inputserver,inputPath,
    ]
    const url = "/genpro/controllers/servers.php";
    if (Boolean(inputname)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name : inputname,
                type : inputType,
                password : inputpassword,
                path : inputPath,
                servers : inputserver,
                action : "create"
            },
            
            success: function(data) {
                reloadPage()
                
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
function serversUpdate() {
    let serversupdate = document.getElementById("serversupdate").value;
    let name = document.getElementById("deskripsi").innerHTML;
    var nama  = name.split("-");
    var servers  = serversupdate.split("\n");
    
    const url = "/genpro/controllers/servers.php"
    if (Boolean(servers)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name: nama[1],
                type : nama[0],
                servers : servers,
                action : "create"
            },
            success: function(data) {
                // console.log(data);
                // reloadPage()
                document.getElementById("serversupdate").value ='';
                var data1  = data.slice(0, data.indexOf('.j'));
                serversIndex(data1)
                alert('update berhasil');
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Proxy Kosong, harap pilih salah satu bug';
    }
}
function serversDelete() {
    let name = document.getElementById("deskripsi").innerHTML;
    const url = "/genpro/controllers/servers.php"
    if (Boolean(name)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                name: name,
                action : "delete"
            },
            success: function(data) {
                // console.log(data);
                reloadPage();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Harap pilih salah satu bug';
    }
}

