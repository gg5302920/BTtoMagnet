<?php
include './BEncode.php';
include './BDecode.php';
$path = $_GET["bt"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $path);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$notice = curl_exec($ch);
$torrent = $notice;
$desc = BDecode($torrent);
$info = $desc['info'];
$hash = strtoupper(sha1( BEncode($info) ));
$magnet = sprintf('magnet:?xt=urn:btih:%s&dn=%s', $hash, $info['name']);
echo $magnet;