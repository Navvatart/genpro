
function bugsCreate() {

    let namabug = document.getElementById("namabug").value;
    let isp = document.getElementById("isp").value;
    let bugsArea = document.getElementById("bugs_area").value;
    let bugs = bugsArea.split("\n")
    const url = "/genpro/controllers/bugs.php"

    if (Boolean(namabug && isp)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                namabug: namabug,
                isp : isp,
                bugs : bugs,
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
function bugsIndex(dataId) {
   
    const url ="/genpro/config/bugs/"+dataId+'.json';
    const address = fetch(url)
    .then((response) => response.json())
    .then((user) => {
        return user;
    });

    const printAddress = async () => {
    const bugs = await address;
    var view_bug = '';
    bugs.forEach((bug) => {
        view_bug += bug + `\n`;
    });
     document.getElementById("bugsupdate").value = view_bug;
    };
     printAddress();
}
function bugsUpdate() {
    let bugsupdate = document.getElementById("bugsupdate").value;
    let namabug = document.getElementById("deskripsi").innerHTML;
    var nama  = namabug.split("-");
    let bugscek = bugsupdate.split("\n")
    var bugs = bugscek.filter(value => Object.keys(value).length !== 0);
    const url = "/genpro/controllers/bugs.php"
    if (Boolean(bugs)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                namabug: nama[1],
                isp : nama[0],
                bugs : bugs,
                action : "create"
            },
            success: function(data) {
                // console.log(data);
                // reloadPage()
                document.getElementById("bugsupdate").value ='';
                var data1  = data.slice(0, data.indexOf('.j'));
                bugsIndex(data1)
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
function bugsDelete() {
    let namabug = document.getElementById("deskripsi").innerHTML;
    const url = "/genpro/controllers/bugs.php"
    if (Boolean(namabug)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                namabug: namabug,
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