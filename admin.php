<?php
// مسیر فایل داده‌ها
$dataFile = 'data.txt';
$logFile = 'log.txt';
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>پنل مدیریت</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; }
h1 { color: #333; }
pre { background: #fff; padding: 10px; border: 1px solid #ccc; overflow-x: auto; }
</style>
</head>
<body>

<h1>پنل مدیریت سایت خوارزمی</h1>

<h2>داده‌های کاربران (data.txt)</h2>
<pre>
<?php
if(file_exists($dataFile)){
    echo file_get_contents($dataFile);
} else {
    echo "فایل data.txt موجود نیست.";
}
?>
</pre>

<h2>لاگ‌ها (log.txt)</h2>
<pre>
<?php
if(file_exists($logFile)){
    echo file_get_contents($logFile);
} else {
    echo "فایل log.txt موجود نیست.";
}
?>
</pre>

</body>
</html>
