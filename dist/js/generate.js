function selectConfig() {
    let data = document.getElementById("serverlist").value;
    if (Boolean(data) === false) {
        generate(getTextBug())
    } else {
        return false;
    }
    
}
function getTextBug() {
    let data = document.getElementById("bugsupdate").value;
    const split_string = data.split("\n");
    var filtered = split_string.filter(Boolean);
    return filtered
}

function getMode(mode, method,port,bug,data) {

    if (method[0] == 'trojan') {
        var format = trojanMethod(mode, port,bug, data)
      }else if(method[0] == 'vmess'){
        var format = vmessMethod(mode, port,bug, data)
        
      }else if(Boolean(method)==false) {
        var trojan = trojanMethod(mode, port,bug, data)+'\n'
        var vmess = vmessMethod(mode, port,bug, data)
        var format = trojan + vmess
        
      }else if(Boolean(method)==false) {
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
    
}
function generate(bugs) {
    document.getElementById("text_proxy").innerHTML = '';
    let server = document.getElementById("server_area").value;
    var no = 0;
    var vmess = '';
    var trojan = '';
    var view_bug = '';
    var property = `proxies:\n`;
    bugs.forEach((bug) => {
        no++
        view_bug += server + `\n`;
    });
    var hasil = property + view_bug;
    document.getElementById("text_proxy").innerHTML += hasil;
}