<?php
include './BEncode.php';
include './BDecode.php';
$path = $_GET["bt"];
$torrent = file_get_contents($path);
$desc = BDecode($torrent);
$info = $desc['info'];
$hash = strtoupper(sha1( BEncode($info) ));
$magnet = sprintf('magnet:?xt=urn:btih:%s&dn=%s', $hash, $info['name']);
echo $magnet;
