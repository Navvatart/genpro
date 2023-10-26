const url = "/genpro/controllers/bugs.php"
function bugsCreate() {

    let namabug = document.getElementById("namabug").value;
    let isp = document.getElementById("isp").value;
    let bugsArea = document.getElementById("bugs_area").value;
    let bugs = bugsArea.split("\n")

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
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Nama atau ISP masih Kosong !!..';
    }
}
function bugsIndex(data) {
    if (Boolean(data)) {
        $.ajax({
            type: "GET",
            url: url,
            data: {
                namabug: data,
                action : "index"
            },
            dataType: "json",
            success: function(data) {
                var bugs ='';
                document.getElementById("bugsupdate").value ='';
                data.forEach((bug) => {
                    if (Boolean(bug)) {
                        bugs += bug + `\n`;
                    }
                });
                document.getElementById("bugsupdate").value = bugs;
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Bugs Kosong, harap pilih salah satu bug';
    }
}
function bugsUpdate() {
    let bugsupdate = document.getElementById("bugsupdate").value;
    let namabug = document.getElementById("namebug").value;
    var isp  = namabug.split("-");
    var nama  = isp[1].split(".");
    let bugscek = bugsupdate.split("\n")
    var bugs = bugscek.filter(value => Object.keys(value).length !== 0);
    if (Boolean(bugs)) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                namabug: nama[0],
                isp : isp[0],
                bugs : bugs,
                action : "create"
            },
            success: function(data) {
                // console.log(data);
                // reloadPage()
                document.getElementById("bugsupdate").value ='';
                bugsIndex(namabug)
                alert('update berhasil');
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    } else {
        document.getElementById("deskripsi").innerHTML = 'Bugs Kosong, harap pilih salah satu bug';
    }
}
function bugsDelete() {
    let namabug = document.getElementById("namebug").value;
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