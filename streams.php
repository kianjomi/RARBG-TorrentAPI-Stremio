<?php
include 'helpers.php';
$streams = getRequestParams();
$imdb = $streams->id;
$appid = date('ymdH');
$tokenurl = 'https://torrentapi.org/pubapi_v2.1.php?app_id='.$appid.'&get_token=get_token';
$tokench = curl_init($tokenurl);
curl_setopt($tokench, CURLOPT_TIMEOUT, 5);
curl_setopt($tokench, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($tokench, CURLOPT_RETURNTRANSFER, true);
curl_setopt($tokench, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');
$token = curl_exec($tokench);
curl_close($tokench);
$token = substr($token, 10, 10);
if (strpos($imdb, ':') !== false) {
$imdbtv = substr($imdb, 0, 9);
preg_match_all('/:(.*?):/s', $imdb, $season);
$season = $season[1][0];
if ($season < 10) {
$season = '0'.$season;
}
$episode = substr($imdb, strrpos($imdb, ':') + 1);
if ($episode < 10) {
$episode = '0'.$episode;
}
$seaepi = 'S'.$season.'E'.$episode;
$tapiurl = 'https://torrentapi.org/pubapi_v2.1.php?app_id='.$appid.'&mode=search&search_string='.$seaepi.'&search_imdb='.$imdbtv.'&category=18;41&sort=seeders&min_seeders=0&limit=10&format=json_extended&token='.$token.'';
} else {
$tapiurl = 'https://torrentapi.org/pubapi_v2.1.php?app_id='.$appid.'&mode=search&search_imdb='.$imdb.'&category=17;44;45&sort=seeders&min_seeders=0&limit=10&format=json_extended&token='.$token.'';
}
$tapich = curl_init($tapiurl);
curl_setopt($tapich, CURLOPT_TIMEOUT, 5);
curl_setopt($tapich, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($tapich, CURLOPT_RETURNTRANSFER, true);
curl_setopt($tapich, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');
$tapi = curl_exec($tapich);
curl_close($tapi);
preg_match_all('/{"title":"(.*?)","category":"/s', $tapi, $title);
preg_match_all('/"seeders":(.*?),"/s', $tapi, $seeders);
preg_match_all('/"leechers":(.*?),"/s', $tapi, $leechers);
preg_match_all('/"size":(.*?),"/s', $tapi, $size);
preg_match_all('/=urn:btih:(.*?)&dn=/s', $tapi, $magnet);
preg_match_all('/"pubdate":"(.*?) /s', $tapi, $pubdate);
$size0 = $size[1][0];
$size0 = $size0/1048576;
$size1 = $size[1][1];
$size1 = $size1/1048576;
$size2 = $size[1][2];
$size2 = $size2/1048576;
$size3 = $size[1][3];
$size3 = $size3/1048576;
$size4 = $size[1][4];
$size4 = $size4/1048576;
$size5 = $size[1][5];
$size5 = $size5/1048576;
$size6 = $size[1][6];
$size6 = $size6/1048576;
$size7 = $size[1][7];
$size7 = $size7/1048576;
$size8 = $size[1][8];
$size8 = $size8/1048576;
$size9 = $size[1][9];
$size9 = $size9/1048576;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$pdate = str_replace('-', '', $pubdate[1][0]);
$pdate = date_create($pdate);
$pdate = date_format($pdate, 'ymdHi');
$pdate2d = date('ymdHi', strtotime('-2 days'));
if ($pubdate[1][0] == '') {
header("Cache-Control: public, max-age=30, s-maxage=60");
} elseif ($pdate >= $pdate2d) {
header("Cache-Control: public, max-age=21600, s-maxage=43200");
} else {
header("Cache-Control: public, max-age=518400, s-maxage=1036800");	
}
header("Content-Type: application/json");
$stream0 = new stdClass();
$stream0->availability = "1";
$stream0->name = "RARBG";
$stream0->title = $title[1][0].' , '.$seeders[1][0].' S / '.$leechers[1][0].' L , '.round($size0, 0).' MB';
$stream0->infoHash = $magnet[1][0];
$stream1->availability = "1";
$stream1->name = "RARBG";
$stream1->title = $title[1][1].' , '.$seeders[1][1].' S / '.$leechers[1][1].' L , '.round($size1, 0).' MB';
$stream1->infoHash = $magnet[1][1];
$stream2->availability = "1";
$stream2->name = "RARBG";
$stream2->title = $title[1][2].' , '.$seeders[1][2].' S / '.$leechers[1][2].' L , '.round($size2, 0).' MB';
$stream2->infoHash = $magnet[1][2];
$stream3->availability = "1";
$stream3->name = "RARBG";
$stream3->title = $title[1][3].' , '.$seeders[1][3].' S / '.$leechers[1][3].' L , '.round($size3, 0).' MB';
$stream3->infoHash = $magnet[1][3];
$stream4->availability = "1";
$stream4->name = "RARBG";
$stream4->title = $title[1][4].' , '.$seeders[1][4].' S / '.$leechers[1][4].' L , '.round($size4, 0).' MB';
$stream4->infoHash = $magnet[1][4];
$stream5->availability = "1";
$stream5->name = "RARBG";
$stream5->title = $title[1][5].' , '.$seeders[1][5].' S / '.$leechers[1][5].' L , '.round($size5, 0).' MB';
$stream5->infoHash = $magnet[1][5];
$stream6->availability = "1";
$stream6->name = "RARBG";
$stream6->title = $title[1][6].' , '.$seeders[1][6].' S / '.$leechers[1][6].' L , '.round($size6, 0).' MB';
$stream6->infoHash = $magnet[1][6];
$stream7->availability = "1";
$stream7->name = "RARBG";
$stream7->title = $title[1][7].' , '.$seeders[1][7].' S / '.$leechers[1][7].' L , '.round($size7, 0).' MB';
$stream7->infoHash = $magnet[1][7];
$stream8->availability = "1";
$stream8->name = "RARBG";
$stream8->title = $title[1][8].' , '.$seeders[1][8].' S / '.$leechers[1][8].' L , '.round($size8, 0).' MB';
$stream8->infoHash = $magnet[1][8];
$stream9->availability = "1";
$stream9->name = "RARBG";
$stream9->title = $title[1][9].' , '.$seeders[1][9].' S / '.$leechers[1][9].' L , '.round($size9, 0).' MB';
$stream9->infoHash = $magnet[1][9];
$streams->streams = array($stream0,$stream1,$stream2,$stream3,$stream4,$stream5,$stream6,$stream7,$stream8,$stream9);
echo json_encode((array)$streams);
?>
