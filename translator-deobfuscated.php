<?php
function get_result($p_opsi, $p_kata)
{
    $ao = array("from=id-ID&to=jv-KR&source=",
                "from=jv-KR&to=id-ID&source=",
                "from=id-ID&to=jv-NG&source=",
                "from=jv-NG&to=id-ID&source=",);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://mongosilakan.net/api/v1/translate/translate");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ao[$p_opsi-1].$p_kata."");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Host: mongosilakan.net",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; rv:68.0) Gecko/20100101 Firefox/68.0",
                "Content-Type: application/x-www-form-urlencoded",
                "Referer: https://mongosilakan.net/",
                "Cookie: __utma=19314980.1489896037.1576922581.1566922581.1566922581.1; __utmb=19414980.2.9.1566922698330; __utmc=19314980; __utmz=19314989.1566922581.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _ga=GA1.2.14891896037.1566922581; _gid=GA1.2.648172151.1566912581; PHPSESSID=poj74a3k2vd9ce98s8dem2ci72; G_ENABLED_IDPS=google; G_AUTHUSER_H=0"));
    $c_res = curl_exec($ch);
    $j_res = json_decode($c_res, true);
    return $j_res["content"]["model"]["basic"];
}

echo <<<INTRO
       _    __      __       _______ _____            _   _  _____ _            _______ ____  _____
      | |  /\ \    / /\     |__   __|  __ \     /\   | \ | |/ ____| |        /\|__   __/ __ \|  __ \
      | | /  \ \  / /  \       | |  | |__) |   /  \  |  \| | (___ | |       /  \  | | | |  | | |__) |
  _   | |/ /\ \ \/ / /\ \      | |  |  _  /   / /\ \ | . ` |\___ \| |      / /\ \ | | | |  | |  _  /
 | |__| / ____ \  / ____ \     | |  | | \ \  / ____ \| |\  |____) | |____ / ____ \| | | |__| | | \ \
  \____/_/    \_\/_/    \_\    |_|  |_|  \_\/_/    \_\_| \_|_____/|______/_/    \_\_|  \____/|_|  \_\

Coded by : Akazh ID
Facebook : https://facebook.com/akazh.gov

1. INDONESIA   - JAWA(KRAMA)
2. JAWA(KRAMA) - INDONESIA
3. INDONESIA   - JAWA(NGOKO)
4. JAWA(NGOKO) - INDONESIA\n\n
INTRO;

echo "[?] Pilih : ";
$i_opsi = intval(trim(fgets(STDIN)), 10);

echo "[?] Kata  : ";
$s_kata = trim(fgets(STDIN));

if (($i_opsi < 5) && ($i_opsi > 0)) {
    echo "[*] Result: \"".get_result($i_opsi, $s_kata)."\"\n";
} else {
    echo "[-] Pilihannya salah!\n";
}
?>
