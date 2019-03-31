<?php
include 'helpers.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Cache-Control: public, max-age=518400, s-maxage=1036800");
header("Content-Type: application/json");
$manifest = new stdClass();
$manifest->id = "com.stremio.rarbgtorrentapi";
$manifest->version = "1.2.3";
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
