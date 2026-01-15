<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FirstyWorld</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-box">
    <div class="avatar-block">
        <label for="avatar">
            <div class="avatar-circle">
                <span>+</span>
            </div>
        </label>
        <input type="file" id="avatar" hidden>
    </div>

    <input type="text" placeholder="Введите никнейм" class="nickname">

</div>

<div class="second-box">
    <button onclick="location.href='rooms.html'">Играть</button>
    <button onclick="openSettings()">Настройки</button>
</div>

<script>
function openSettings(){
    alert("Окно настроек будет здесь (вкладки: аккаунт, фон, приватность)");
}
</script>

</body>
</html>
