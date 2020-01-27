<?php 
$str = "Tolong di edit, seperti ini.
1. Penandatanganan kerjasama antara Pasar Jaya dan bank DKI di acara pembukaan.
2. Pasar Jaya mendapatkan booth 1 Pasar Jaya dan 1 UMKM.
3. Rapat terkait PKS VMS akan di infokan.";
$output = htmlspecialchars($str, ENT_HTML5);
$out = nl2br($output);
$o = trim(preg_replace('/\s+/', ' ', $out));

echo trim(nl2br($o));
?>