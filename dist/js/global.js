
$(document).ready(function(){
    // select bugs
    $(".select-bugs").on("click", function(){
        var dataId = $(this).attr("data-id");
        var data  = dataId.slice(0, dataId.indexOf('.j'));
        document.getElementById("deskripsi").innerHTML = data;
        
        bugsIndex(data);
    });
// select servers
    $(".select-servers").on("click", function(){
        var dataId = $(this).attr("data-id");
        var data  = dataId.slice(0, dataId.indexOf('.j'));
        document.getElementById("deskripsi").innerHTML = data;
        
        serversIndex(data);
    });
});


//  function for server
function serversIndex(dataId) {
   
    const url ="/genpro/config/servers/"+dataId+'.json';
    const address = fetch(url)
    .then((response) => response.json())
    .then((user) => {
        return user;
    });

    const printAddress = async () => {
    const data = await address;

   var view_data = '';
   var myJsonString = JSON.stringify(data);
   let finalJson=JSON.parse(myJsonString);
//    console.log(data);
   let coba = `name: `+data.name+`
password: `+data.password+`
path: `+data.path+`
server: `+data.servers+`
type: `+data.type+``;
     document.getElementById("serversupdate").value = coba+'';
    };
     printAddress();
}

function comingSoon() {
    var format = 'Coming soon...';
    alert('Coming Soon...');
    return false;
}
function reloadPage() {
    $(document).ajaxStop(function(){
        window.location.reload();
    });
}
function kosong(info) {
    alert(info+ ', ada yang kosong...');
    return false;
}
function info(input) {
    alert(input);
    return false;
}
function validate(event) {
    
    var  key= event.which || event.keyCode || 0;
    // alert(key);
    return (key !== 45)
}
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })