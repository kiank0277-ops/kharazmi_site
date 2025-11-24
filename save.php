<?php
// تابع برای تشخیص نوع دستگاه
function deviceType() {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/mobile/i', $agent)) {
        return "موبایل";
    } else {
        return "کامپیوتر";
    }
}

// دریافت داده‌ها از فرم
$name = $_POST['name'] ?? '';
$family = $_POST['family'] ?? '';  // ← باید با name فرم هماهنگ باشه
$phone = $_POST['phone'] ?? '';
$code = $_POST['code'] ?? '';

// اطلاعات دستگاه و آی‌پی
$device = deviceType();
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("Y-m-d H:i:s");

// ذخیره در data.txt
$data = "نام: $name | نام خانوادگی: $family | شماره: $phone | کد: $code | دستگاه: $device | زمان: $time\n";
file_put_contents(__DIR__ . "/data.txt", $data, FILE_APPEND);

// ذخیره در log.txt
$log = "نام: $name | نام خانوادگی: $family | شماره: $phone | کد: $code | دستگاه: $device | آی‌پی: $ip | زمان: $time\n";
file_put_contents(__DIR__ . "/log.txt", $log, FILE_APPEND);
// پاسخ کوتاه برای تایید ذخیره
echo "saved";
?>



