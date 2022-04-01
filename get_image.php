<?php
#!/usr/bin/env php
$login = '';
$password = '';
$url = 'http://ip/cgi-bin/snapshot.cgi';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$result = curl_exec($ch);
curl_close($ch);

$im = imagecreatefromstring($result);
$now = date("U");
$newfile = "/tmp/$now.jpg";
file_put_contents($newfile, $url);
$newnew = imagecreatetruecolor(1280,720);
imagecopyresized($newnew, $im, 0, 0, 0, 0, 1280, 720, 1920, 1080);
$newnewfile = "/some/path/to/image.jpg";
imagejpeg($newnew, $newnewfile);

imagedestroy($im);
imagedestroy($newnew);

$result = system('/usr/bin/python3 /some/path/to/send_pic.py', $retval);


?>
