<?php
require('JSON.php');
$json = new Services_JSON();

header('Content-Type: text/plain;charset=UTF-8');
$id = $_REQUEST['id'];
if ($id=='ardepg') {
  echo 'video/mp4#http://itv.ard.de/video/trailer.php';
} else if ($id=='mpegts') {
  echo 'video/mpeg#http://itv.ard.de/video/timecode.mpeg';
} else if ($id=='rtl') {
  echo 'video/mp4#http://bilder.rtl.de/tt_hd/trailer_hotelinspektor.mp4';
} else if ($id=='audiomp3') {
  echo 'audio/mpeg#http://swr.ic.llnwd.net/stream/swr_mp3_m_swr3a';
} else if ($id=='audiomp4') {
  echo 'audio/mp4#http://itv.ard.de/video/audio.php';
} else if ($id=='irthd') {
  echo 'video/mp4#http://itv.ard.de/video/irthd.mp4';
} else if ($id=='zdf') {
  $data = $json->decode(file_get_contents('http://itv.mit-xperts.com/zdfmediathek/dyn/list.php?type=11'));
  $id = rawurlencode($data[1][0][0]);
  $data = $json->decode(file_get_contents('http://itv.mit-xperts.com/zdfmediathek/dyn/detail.php?id='.$id));
  $url = $data[1][1][4];
  echo 'video/mp4#'.$url;
} else if ($id=='tsstream') {
  echo 'video/mpeg#http://itv.ard.de/video/livestream.php';
} else if ($id=='gundl1') {
  echo 'video/mpeg#http://hbbtv.olympia.gl-systemhaus.de/olympia1.ts';
} else if ($id=='nacamar1') {
  echo 'video/mpeg#http://hbbtv.nacamar.c.nmdn.net/nacamar/test';
} else {
  echo 'Unknown ID';
}
?>
