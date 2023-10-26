<?php
$vmess_ws_sni = "- name: ".$name."-WS (SNI)-".$bug."
  type: vmess
  server: ".$server['server']."
  port: ".$port."
  uuid: ".$server['password']."
  alterId: 0
  cipher: auto
  udp: true
  tls: true
  skip-cert-verify: true
  servername: ".$bug."
  network: ws
  ws-opts:
    path: ".$server['path']."
    headers:
      Host: ".$bug.""; 
$vmess_ws_cdn = "- name: ".$name."-WS (CDN)-".$bug."
  type: vmess
  server: ".$bug."
  port: ".$port."
  uuid: ".$server['password']."
  alterId: 0
  cipher: auto
  udp: true
  tls: true
  skip-cert-verify: true
  servername: ".$server['server']."
  network: ws
  ws-opts:
    path: ".$server['path']."
    headers:
      Host: ".$server['server'].""; 
$vmess_ws_notls = "- name: ".$name."-WS (CDN) Non TLS-".$bug."
  type: vmess
  server: ".$bug."
  port: 80
  uuid: ".$server['password']."
  alterId: 0
  cipher: auto
  udp: true
  tls: false
  skip-cert-verify: false
  servername: ".$server['server']."
  network: ws
  ws-opts:
    path: ".$server['path']."
    headers:
      Host: ".$server['server'].""; 
$vmess_grpc_sni = "- name: ".$name."-gRPC (SNI)-".$bug."
  server: ".$server['server']."
  port: ".$port."
  type: vmess
  uuid: ".$server['password']."
  alterId: 0
  cipher: auto
  network: grpc
  tls: true
  servername: ".$bug."
  skip-cert-verify: true
  grpc-opts:
    grpc-service-name: NAMAGRPC"; 