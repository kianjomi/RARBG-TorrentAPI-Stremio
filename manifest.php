<?php
include 'helpers.php';
setHeaders();
$manifest = new stdClass();
$manifest->id = "com.stremio.rarbgtorrentapi";
$manifest->version = "1.0.0";
$manifest->name = "RARBG TorrentAPI";
$manifest->description = "Watch movies and series from RARBG in Stremio.";
$manifest->icon = "https://".$_SERVER['HTTP_HOST']."/logo.png";
$manifest->resources = array("stream", "catalog");
$manifest->types = array("movie", "series");
$manifest->idPrefixes = array("tt");
$catalog = new stdClass();
$catalog->type = "other";
$catalog->id = "local";
$catalog->name = "RARBG";
$manifest->catalogs = array($catalog);
echo json_encode((array)$manifest);
?>