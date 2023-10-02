function trojanMethod(mode, port,bug, data) {
    if (mode == 'all'){
        comingSoon();
    }
    if (mode == 'gfw-sni'){
        var format = trojan_gfw_sni(port,bug, data)
        return format;
    }
    if (mode == 'ws-sni'){
        var format = trojan_ws_sni(port,bug, data)
        return format;
    }
    if (mode == 'ws-cdn'){
        var format = trojan_ws_cdn(port,bug, data)
        return format;
    }
    if (mode == 'ws-notls'){
        // comingSoon();
       // return 'Untuk VMESS'
       return '';
    }
    if (mode == 'grpc-sni'){
        var format =trojan_grpc_sni(port,bug, data)
        return format;
    }
    if (mode == 'xtls-sni'){
        var format = trojan_xtls_sni(port,bug, data)
        return format;
    }
    
    
}
function vmessMethod(mode, port,bug, data) {
    if (mode == 'all'){
        var format = 'mode all';
        comingSoon();
    }
    if (mode == 'gfw-sni'){
        return '';
        // return 'Untuk Trojan'
        // var format = trojan_gfw_sni(port,bug, data)
        // return format;
    }
    if (mode == 'ws-sni'){
        var format = vmess_ws_sni(port,bug, data)
        return format;
    }
    if (mode == 'ws-cdn'){
        var format = vmess_ws_cdn(port,bug, data)
        return format;
    }
    if (mode == 'ws-notls'){
        var format = vmess_ws_notls(port,bug, data)
        return format;
    }
    if (mode == 'grpc-sni'){
        var format = vmess_grpc_sni(port,bug, data)
        return format;
    }
    if (mode == 'xtls-sni'){
        // var format = trojan_xtls_sni(port,bug, data)
        // return format;
        // return 'Untuk Trojan'
        return '';
    }
    
}

function allServer() {
    
}