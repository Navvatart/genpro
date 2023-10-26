$(document).ready(function(){
    $(".select-bugsindex").on("click", function(){
        let modebug = document.getElementById("modebug").value;
        var bugs = $(this).attr("data-id");
        let port = document.getElementById("port").value;
        let server = document.getElementById("serverlist").value;
        var nama  = server.split("-");
        var name  = nama[1].split(".");
        document.getElementById("text_proxy").innerHTML = '';
        var property = `proxies:\n`;
        if (Boolean(bugs)) {
            $.ajax({
                type: "get",
                url: '/genpro/controllers/index.php',
                dataType: "json",
                data: {
                    modebug: modebug,
                    bugs: bugs,
                    port: port,
                    server: server,
                    name: name[0]
                },
                success: function(data) {
                    // info('File saved successfully');
                    console.log(data.bugs);
                    var proxies = '';
                    var bugs = '';
                    if (Boolean(data)) {
                        data.proxies.forEach((proxie) => {
                            if (Boolean(proxie)) {
                                proxies += proxie + `\n`;
                            }
                        });
                        data.bugs.forEach((bug) => {
                            if (Boolean(bug)) {
                                bugs += bug + `\n`;
                            }
                        });
                        console.log(proxies);
                        document.getElementById("text_proxy").innerHTML += property;
                        document.getElementById("text_proxy").innerHTML += proxies;
                        document.getElementById("bugsupdate").value = bugs;
                    }else{
                        
                    }
                    // document.getElementById("deskripsi").innerHTML = 'Berhasil diupdated';
                    
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        } else {
            document.getElementById("deskripsi").innerHTML = 'Proxy Kosong, ';
        }
       
        
    });
    // mode bugs
    $(".select-mode").on("change", function(){
        let modebug = $(this).val();
        // let modebug = document.getElementById("modebug").value;
        let port = document.getElementById("port").value;
        let server = document.getElementById("serverlist").value;
        var nama  = server.split("-");
        var name  = nama[1].split(".");
        var property = `proxies:\n`;
        if (Boolean(modebug)) {
            $.ajax({
                type: "post",
                url: '/genpro/controllers/index.php',
                dataType: "json",
                data: {
                    modebug: modebug,
                    bugs: false,
                    port: port,
                    server: server,
                    name: name[0]
                    },
                success: function(data) {
                        document.getElementById("server_area").value = data;
                    
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        } else {
            alert('Server is empty');
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
                
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        alert('Proxy Is empty');
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

