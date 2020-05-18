<!-- V4R1ABLE - T13R - OBIR.NINJA -->
<html>
<head>
<title>Zararlı Dosya Tarayıcı - V4R1ABLE - T13R - OBIR.NINJA</title>
<style type="text/css">
a {
text-decoration:none;
color:red;
}
</style>
</head>
<body>
<center>
<form action="" method="POST">
<a href="https://obir.ninja"><img src="https://i1.wp.com/obir.ninja/wp-content/uploads/2020/01/01c2931c38911a33fdec2b53b9f2bdc5-1.png?w=315&ssl=1"></a><br>
Site adresi(https:// veya http:// olmasın) : <br><input type="text" name="v4_site" placeholder="obir.ninja"><br><br>
Anahtar kelime : <br><input type="text" name="v4_key" placeholder="webmaster"><br><br>
Site listesi (https:// veya http:// zorunludur)<br><textarea type="text" name="v4_sitelist" style="margin: 0px; width: 727px; height: 185px;" placeholder="https://obir.ninja
https://obir.ninja/sayfa.php"></textarea><br><br>
<input type="checkbox" id="http_https" name="http_https">
<label for="http_https"> https:// ve http:// iki türlü kontrol et</label><br><input type="checkbox" id="nofollow" name="nofollow">
<label for="nofollow"> rel="nofollow" olan linkleride kontrol et</label><br>
<input type="checkbox" id="textarea_cikti" name="textarea_cikti">
<label for="textarea_cikti"> çıktıyı textarea olarak çıkar</label><br><br>
<button type="submit" name="v4t1_post_check">Kontrol Et</button>
</form>
<?php
// v4r1able - t13r - obir.ninja
error_reporting(0);
if(isset($_POST["v4t1_post_check"])) {
//trim
$v4_site_trim = trim($_POST["v4_site"]);
$v4_key_trim = trim($_POST["v4_key"]);
$v4_sitelist_trim = trim($_POST["v4_sitelist"]);
if(empty($v4_site_trim and $v4_key_trim and $v4_sitelist_trim)) {
echo 'Boş input bırakmayınız.';
}

//variables
$v4_site = $_POST["v4_site"];
$v4_key = $_POST["v4_key"];
$v4_sitelist = $_POST["v4_sitelist"];
$v4_http_https = $_POST["http_https"];
$v4_nofollow = $_POST["nofollow"];
$v4_textarea_cikti = $_POST["textarea_cikti"];

//işlemler
$sitelist_ex = explode("\n", $v4_sitelist);
$sitelist_count = count($sitelist_ex);

function check_link($aranacak_site, $site_adresi, $anahtar_kelime, $ozellikler_n) {
$ch = curl_init($site_adresi);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt ($ch, CURLOPT_VERBOSE, 1);
curl_setopt ($ch, CURLOPT_NOBODY, 0);
$v4t1 = curl_exec($ch);

if(strstr($ozellikler_n, "on_ta")) {

echo '<br><textarea id="cikti" type="text" style="margin: 0px; width: 727px; height: 185px;">';

}

if(strstr($ozellikler_n, "on_ps")) {
if(strstr($v4t1, '<a href="https://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html = htmlspecialchars('<a href="https://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
echo 'HTTPS LINK - '.$site_adresi.' adresinde '.$anahtar_kelime.' anahtar kelimesinde link bulundu - '.$yazdir_html.'

';
	} else {
echo "HTTPS LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html."</u><br>";
}
}

if(strstr($v4t1, '<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html_2 = htmlspecialchars('<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
 echo "HTTP LINK - ".$site_adresi." adresinde ".$anahtar_kelime." anahtar kelimesinde link bulundu - ".$yazdir_html_2."

 ";   
	} else {
echo "HTTP LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html_2."</u><br>";
}
}
} else {

if(strstr($v4t1, '<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html_2 = htmlspecialchars('<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
echo "HTTP LINK - ".$site_adresi." adresinde ".$anahtar_kelime." anahtar kelimesinde link bulundu - ".$yazdir_html_2."

";
	} else {
echo "HTTP LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html_2."</u><br>";
}
}

}

if(strstr($ozellikler_n, "on_nf")) {
if(strstr($ozellikler_n, "on_ps")) {
if(strstr($v4t1, '<a rel="nofollow" href="https://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html_nf = htmlspecialchars('<a rel="nofollow" href="https://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
echo "NOFOLLOW HTTPS LINK - ".$site_adresi." adresinde ".$anahtar_kelime." anahtar kelimesinde link bulundu - ".$yazdir_html_nf."

";
	} else {
echo "NOFOLLOW HTTPS LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html_nf."</u><br>";
}
}
} else {

if(strstr($v4t1, '<a rel="nofollow" href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html_2 = htmlspecialchars('<a rel="nofollow" href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
echo "NOFOLLOW HTTP LINK - ".$site_adresi." adresinde ".$anahtar_kelime." anahtar kelimesinde link bulundu - ".$yazdir_html_2."

";
	} else {
echo "NOFOLLOW HTTP LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html_2."</u><br>";
}
}
}

} else {

if(strstr($v4t1, '<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>')) {
$yazdir_html_2 = htmlspecialchars('<a href="http://'.$aranacak_site.'">'.$anahtar_kelime.'</a>');
if(strstr($ozellikler_n, "on_ta")) {
echo "HTTP LINK - ".$site_adresi." adresinde ".$anahtar_kelime." anahtar kelimesinde link bulundu - ".$yazdir_html_2."

";
	} else {
echo "HTTP LINK - <u>".$site_adresi."</u> adresinde <u>".$anahtar_kelime."</u> anahtar kelimesinde link bulundu - <u>".$yazdir_html_2."</u><br>";
}
}

}

echo '</textarea><br><button onclick="kopyala_v4()">Çıktıyı Kopyala</button>';

}


if($v4_http_https=="on") {
$http_https = "on_ps";
echo 'HTTP/HTTPS şeklinde aramalar listeleniyor<br>';
}

if($v4_nofollow=="on") {
$nofollow = "on_nf";
echo 'NOFOLLOW türü aramalarda listeleniyor<br>';
}

if($v4_textarea_cikti=="on") {
$textarea = "on_ta";
echo 'Çıktılar textarea üzerinden verilecek.<br>';
}

$ozellikler = $http_https.$nofollow.$textarea;

for($i=0; $i<$sitelist_count; $i++) {

$v4_sitelist_mass = trim($sitelist_ex[$i]);

check_link($v4_site, $v4_sitelist_mass, $v4_key, $ozellikler);

}

}
?>
<p>We Are <a href="https://obir.ninja">NinjaNetwork</a></p>
</center>
</body>
<script type="text/javascript">
function kopyala_v4() {
  let cikti = document.getElementById("cikti");
  cikti.select();
  document.execCommand("copy");
  alert("Çıktı kopyalandı!");
}
</script>
</html>
