$(document).ready(function(){
    $(".select-bugsindex").on("click", function(){
        var dataId = $(this).attr("data-id");
        var data  = dataId.slice(0, dataId.indexOf('.j'));
        document.getElementById("deskripsi").innerHTML = data;
        if (Boolean(data)) {
            bugsIndex(data);
        }else{
            //alert('cosng guys')
            return false;
        }
        
    });
    // mode bugs
    $(".select-mode").on("change", function(){
        let mode = $(this).val();
        let port = document.getElementById("port").value;
        let server = document.getElementById("serverlist").value;
        if (Boolean(server)) {
            getConfig(port, bug=false,server, mode);
        }else{
            let data = {
                name : 'NAMA SERVER ',
                servers : 'SERVER/BUGCDN.COM',
                password : 'PASSWORD/UUID',
                port : port,
                path :'/PATH',
                bug : 'SERVER.COM/BUGSNI.COM',
            }
            getMode(mode, method=false,port,bug=false,data);
           
            //kosong('pilih server ');
        }
    });
    $(".select-yaml").on("change", function(){
        let mode = $(this).val();
        let port = document.getElementById("port").value;
        let server = document.getElementById("serverlist").value;
        // console.log(server);
        if (Boolean(server)) {
        getConfig(port, bug=false,server, mode);
        }else{
            kosong('pilih server ');
        }
    });
    $(".read-yaml").on("change", function(){
        let input = $(this).val();
        console.log(input);
        const url = "/etc/openclash/proxy_provider";
        var msg= readTextFile(url+'/'+input);
        // readFile(url+'/'+input);
    });
});

// read yaml file
function readTextFile(file) {
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
      if(rawFile.readyState === 4)  {
        if(rawFile.status === 200 || rawFile.status == 0) {
          var allText = rawFile.responseText;
          console.log(allText);
         }
      }
    }
    rawFile.send(null);
  }

// end read yaml file
// simpan ke openclah
function saveFile() {
    var copyText = document.getElementById("text_proxy");
    let post = copyText.value
    let fileyaml = document.getElementById("fileyaml").value;
    const url = "/genpro/controllers/yaml.php"
    if (Boolean(post)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                codenya: post,
                fileyaml : fileyaml
            },
            success: function(data) {
                info('File saved successfully');
                document.getElementById("deskripsi").innerHTML = 'Berhasil diupdated';
                
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Proxy Kosong, ';
    }
}
// and simpan ke openclah
function copytext() {
    var copyText = document.getElementById("text_proxy");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById("info");
    tooltip.innerHTML = "Copied";
    document.getElementById("deskripsi").innerHTML = 'Copied to clipboard';
    // alert('Copied to clipboard')
    return;
}

function getConfig(port,bug,server, mode) {
    const url ="/genpro/config/servers/"+server+".json";
    const address = fetch(url)
    .then((response) => response.json())
    .then((user) => {
        return user;
    });

    const printAddress = async () => {
    const data = await address;
    // mode all
    var method  = server.split("-");
      if (method[0] == 'trojan') {
        var format = trojanMethod(mode, port,bug, data)
      }else if(method[0] == 'vmess'){
        var format = vmessMethod(mode, port,bug, data)
        
      }else {
        var format = 'Coming Soon';
        comingSoon('Dalam Pengembangan, Jangan Lupa Donasi ya... Untuk Mendukung');
      }
       
    
        if (Boolean(bug)==false) {
            document.getElementById("server_area").value = format;
            document.getElementById("text_proxy").innerHTML = '';
        }
        if (Boolean(bug)) {
            document.getElementById("text_proxy").innerHTML += format+ `\n`;
        }
       
    };


    printAddress();
}
function bugsIndex(data) {
    let server = document.getElementById("serverlist").value;
    let nameBugs = document.getElementById("deskripsi").innerHTML;
    let port = document.getElementById("port").value;
    let mode = document.getElementById("modebug").value;
    const url ="/genpro/config/bugs/"+nameBugs+'.json';
    const address = fetch(url)
    .then((response) => response.json())
    .then((data) => {
        return data;
    });

    const printAddress = async () => {
    const bugs = await address;
    var view_bug = '';
    var trojan = '';
    document.getElementById("text_proxy").innerHTML = '';
    var property = `proxies:\n`;
    if (Boolean(server)) {
        bugs.forEach((bug) => {
            if (Boolean(bug)) {
                view_bug += bug + `\n`;
                getConfig(port,bug,server,mode);
            }
        });
        
    }else{
        bugs.forEach((bug) => {
            if (Boolean(bug)) {
                view_bug += bug + `\n`;
                // getConfig(port,bug,server,mode);
            }
        });
        // kosong('harap dilengkapi!..');
        // return false
    }
   
    // var hasil = property + trojan;
     document.getElementById("text_proxy").innerHTML += property;
     document.getElementById("bugsupdate").value = view_bug;
    };
     printAddress();
}
function hapus() {
    // alert('ok');
    window.location.reload();
    // document.getElementById("deskripsi").innerHTML = 'DI BERSIHKAN';
    // document.getElementById("bugsupdate").value = '';
    // document.getElementById("text_proxy").innerHTML = '';
    // document.getElementById("server_area").innerHTML = '';
}

// versi baru belum di pake
// function getServers(selectServer, bugs) {
//     const url = "/genpro/controllers/servers.php"
//     $.ajax({
//         type: "GET",
//         url: url,
//         data: {
//             serverSelect: selectServer,
//             bugs: bugs
//         },
//         success: function(data) {
//             console.log(data);

//         },
//         error: function(xhr, status, error) {
//             console.error(xhr);
//         }
//     });
// }