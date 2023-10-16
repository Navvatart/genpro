<html data-bs-theme="dark">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://192.168.1.1/luci-static/argon/css/lumihime.css?v=2.2.9.4">
    <link href="dist/bootstrap-5.3.1/bootstrap.min.css" rel="stylesheet">
    <link href="dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="dist/bootstrap-5.3.1/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery.min.js?v=3.5.1"></script>

    <script type="text/javascript" src="dist/js/global.js"></script>
    <!-- untuk mode -->
    <script type="text/javascript" src="config/mode/vmess.js"></script>
    <script type="text/javascript" src="config/mode/trojan.js"></script>

    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <header>
        <div class="px-3 py-2 bg-dark text-white">

            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/genpro"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>SAS
                        </svg>
                        <H1>GENPRO</H1>

                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="/genpro" class="nav-link text-white">
                                <i class="fa fa-home bi d-block mx-auto mb-1  text-center fa-2x" aria-hidden="true"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="http://192.168.1.1/" target="_blank" class="nav-link text-white">
                                <i class="fa fa-power-off fa-flip-vertical bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Openwrt
                            </a>
                        </li>
                        <li>
                            <a href="?page=yard" class="nav-link text-white">
                                <!-- <img class="bi d-block mx-auto mb-1"
                                    src="/:9090/ui/yacd/apple-touch-icon-precomposed.png" alt="" width="24" height="24"> -->

                                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#table"></use>
                                </svg> -->
                                <!-- <i class="fa fa-camera-retro fa-2x"></i> fa-5x -->
                                <i class="fa fa-github-alt bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Yard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#base64">
                                <i class="fa fa-pencil-square-o bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Base64
                            </a>
                        </li>
                        <li>
                            <a href="?page=clashconfig" class="nav-link text-white">

                                <i class="fa fa-paw bi d-block mx-auto mb-1  text-center fa-2x" aria-hidden="true"></i>
                                ClashConfig
                            </a>
                        </li>
                        <li>
                            <a href="http://192.168.8.1/" target="_blank" class="nav-link text-white">
                                <i class="fa fa-wifi bi d-block mx-auto mb-1  text-center fa-2x" aria-hidden="true"></i>
                                Modem
                            </a>
                        </li>
                        <li>
                            <a href="?page=netdata" class="nav-link text-white">
                                <i class="fa fa-area-chart bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                NetData
                            </a>
                        </li>
                        <li>
                            <a href="?page=speedtest" class="nav-link text-white">
                                <i class="fa fa-tachometer bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Speedtest
                            </a>
                        </li>
                        <li>
                            <a href="?page=howdy" class="nav-link text-white">
                                <i class="fa fa-shopping-basket bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Howdy
                            </a>
                        </li>
                        <li>
                            <a href="https://stats.uptimerobot.com/v70xBcEM8O" target="_blank"
                                class="nav-link text-white">
                                <i class="fa fa-server bi d-block mx-auto mb-1  text-center fa-2x"
                                    aria-hidden="true"></i>
                                Check Server
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tagline">
                    <h5 class="tagline">Generate Proxies Openclash OpenWRT</h5>
                </div>
            </div>

        </div>

        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">

                    <div class="tombol mt-2" id="deskripsi"></div>
                    <!-- <input type="search" class="form-control" placeholder="Search..." aria-label="Search"> -->
                </form>

                <div class="text-end">

                    <button type="button" class="btn btn-warning btn-outline-info disabled me-2 mb-1 mt-1"> <small>
                            Isi server dan bug di -->
                        </small></button>
                    <a href="?page=insert-server" class="btn btn-light text-dark me-2">Servers</a>
                    <a href="?page=insert-bugs" class="btn btn-light text-dark me-2">Bugs</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Donation
                    </button>
                    <a href="?page=insert-server" class="btn btn-danger text-light me-2">Youtube</a>
                </div>
            </div>
        </div>
    </header>
