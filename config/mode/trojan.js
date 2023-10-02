function trojan_gfw_sni(port,bug, config) {
    var config = `- name: `+config.name+`-GFW(SNI)-`+bug+`
  type: trojan
  server: `+config.servers+`
  port: `+port+`
  password: `+config.password+`
  udp: true
  sni: `+bug+`
  skip-cert-verify: true`; 
  return config; 
}
function trojan_ws_sni(port,bug, config) {
  var config = `- name: `+config.name+`-WS (SNI)-`+bug+`
  server: `+config.servers+`
  port: `+port+`
  type: trojan
  password: `+config.password+`
  skip-cert-verify: true
  sni: `+bug+`
  network: ws
  ws-opts:
    path: `+config.path+`
    headers:
      Host: `+bug+`
  udp: true`; 
return config; 
}
function trojan_ws_cdn(port,bug, config) {
  var config = `- name: `+config.name+`-GO/WS (CDN)-`+bug+`
  server: `+bug+`
  port: `+port+`
  type: trojan
  password: `+config.password+`
  network: ws
  sni: `+config.servers+`
  skip-cert-verify: true
  udp: true
  ws-opts:
    path: `+config.path+`
    headers:
        Host: `+config.servers+``; 
return config; 
}
function trojan_xtls_sni(port,bug, config) {
  var config = `- name: `+config.name+`-XTLS (SNI)-`+bug+`
  server: `+config.servers+`
  port: `+port+`
  type: trojan
  password: `+config.password+`
  flow: xtls-rprx-direct
  skip-cert-verify: true
  sni: `+bug+`
  udp: true`; 
return config; 
}
function trojan_grpc_sni(port,bug, config) {
  var config = `- name: `+config.name+`-gRPC (SNI)-`+bug+`
  type: trojan
  server: `+config.servers+`
  port: `+port+`
  password: `+config.password+`
  udp: true
  sni: `+bug+`
  skip-cert-verify: true
  network: grpc
  grpc-opts:
    grpc-service-name: NAMAGRPC`; 
return config; 
}