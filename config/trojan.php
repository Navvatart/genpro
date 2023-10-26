<?php
$trojan_gfw_sni = "- name: GFW(SNI)-".$name."-".$bug."
  type: trojan
  server: ".$server['server']."
  port: ".$port."
  password: ".$server['password']."
  udp: true
  sni: ".$bug."
  skip-cert-verify: true"; 
$trojan_ws_sni = "- name: WS (SNI)-".$name."-".$bug."
  server: ".$server['server']."
  port: ".$port."
  type: trojan
  password: ".$server['password']."
  skip-cert-verify: true
  sni: ".$bug."
  network: ws
  ws-opts:
    path: ".$server['path']."
    headers:
      Host: ".$bug."
  udp: true"; 
$trojan_ws_cdn = "- name: GO/WS (CDN)-".$name."-".$bug."
  server: ".$bug."
  port: ".$port."
  type: trojan
  password: ".$server['password']."
  network: ws
  sni: ".$server['server']."
  skip-cert-verify: true
  udp: true
  ws-opts:
    path: ".$server['path']."
    headers:
        Host: ".$server['server'].""; 
$trojan_xtls_sni = "- name: XTLS (SNI)-".$name."-".$bug."
  server: ".$server['server']."
  port: ".$port."
  type: trojan
  password: ".$server['password']."
  flow: xtls-rprx-direct
  skip-cert-verify: true
  sni: ".$bug."
  udp: true"; 
$trojan_grpc_sni = "- name: gRPC (SNI)-".$name."-".$bug."
  type: trojan
  server: ".$server['server']."
  port: ".$port."
  password: ".$server['password']."
  udp: true
  sni: ".$bug."
  skip-cert-verify: true
  network: grpc
  grpc-opts:
    grpc-service-name: NAMAGRPC"; 