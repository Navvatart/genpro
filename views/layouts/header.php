<html data-bs-theme="dark">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/bootstrap-5.3.1/bootstrap.min.css" rel="stylesheet">
    <link href="dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="dist/bootstrap-5.3.1/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="http://192.168.1.1/tinyfm/rootfs/www/tinyfm/jquery/jquery-3.6.1.min.js">
    </script>

    <script type="text/javascript" src="dist/js/global.js"></script>

    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <header>



        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                    <div>
                        <h2>GENPRO</h2>
                        <input id="localversion" type="hidden" value="2023-10-26">
                        <span class="tagline">Generate Proxies Openclash OpenWRT</span>
                        <div class="tombol tagline" id="deskripsi"></div>
                    </div>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span id="version"></span>

                            </li>

                            <li class="nav-item">
                                <a href="?page=insert-server" class="btn btn-light text-dark me-2">Servers</a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=insert-bugs" class="btn btn-light text-dark me-2">Bugs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="btn btn-primary text-light me-2" data-bs-toggle="modal"
                                    data-bs-target="#myModal">Donation</a>
                            </li>
                            <li class=" nav-item">
                                <a href="?page=insert-server" class="btn btn-danger text-light me-2">Youtube</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <hr>
        </div>


        <!-- <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">

                   
                </form>

                <div class="text-end">
                    <span id="version"></span>
                    <button type="button" class="btn btn-warning btn-outline-info disabled me-2 mb-1 mt-1"> <small>
                            Isi server dan bug di
                        </small></button>
                    
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Donation
                    </button>
                   
                </div>
            </div>
        </div> -->

    </header>