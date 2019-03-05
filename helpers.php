<?php
function str_replace_last( $search , $replace , $str ) {
if( ( $pos = strrpos( $str , $search ) ) !== false ) {
$search_length  = strlen( $search );
$str    = substr_replace( $str , $replace , $pos , $search_length );
}
return $str;
}

function getRequestParams() {
$requestArgs = new stdClass();
$requestArgs->type = $_GET["type"];
$requestArgs->id = $_GET["id"];
if (isset($_GET["extra"])) {
parse_str($_GET["extra"], $requestArgs->extra);
$requestArgs->extra = (object) $requestArgs->extra;
}
return $requestArgs;
}

function setHeaders() {
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
}
?>