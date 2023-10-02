function vmess_ws_sni(port,bug, config) {
  var config = `- name: `+config.name+`-WS (SNI)-`+bug+`
  type: vmess
  server: `+config.servers+`
  port: `+port+`
  uuid: `+config.password+`
  alterId: 0
  cipher: auto
  udp: true
  tls: true
  skip-cert-verify: true
  servername: `+bug+`
  network: ws
  ws-opts:
    path: `+config.path+`
    headers:
      Host: `+bug+``; 

return config; 
}
function vmess_ws_cdn(port,bug, config) {
  var config = `- name: `+config.name+`-WS (CDN)-`+bug+`
  type: vmess
  server: `+bug+`
  port: `+port+`
  uuid: `+config.password+`
  alterId: 0
  cipher: auto
  udp: true
  tls: true
  skip-cert-verify: true
  servername: `+config.servers+`
  network: ws
  ws-opts:
    path: `+config.path+`
    headers:
      Host: `+config.servers+``; 

return config; 
}
function vmess_ws_notls(port,bug, config) {
  var config = `- name: `+config.name+`-WS (CDN) Non TLS-`+bug+`
  type: vmess
  server: `+bug+`
  port: 80
  uuid: `+config.password+`
  alterId: 0
  cipher: auto
  udp: true
  tls: false
  skip-cert-verify: false
  servername: `+config.servers+`
  network: ws
  ws-opts:
    path: `+config.path+`
    headers:
      Host: `+config.servers+``; 

return config; 
}
function vmess_grpc_sni(port,bug, config) {
  var config = `- name: `+config.name+`-gRPC (SNI)-`+bug+`
  server: `+config.servers+`
  port: `+port+`
  type: vmess
  uuid: `+config.password+`
  alterId: 0
  cipher: auto
  network: grpc
  tls: true
  servername: `+bug+`
  skip-cert-verify: true
  grpc-opts:
    grpc-service-name: NAMAGRPC`; 

return config; 
}