<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pass1 = $_POST["password"];
    $pass2 = $_POST["password2"];

    if ($pass1 !== $pass2) {
        echo "Пароли не совпадают";
        exit;
    }

    $hash = password_hash($pass1, PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Такой email уже существует";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?,?)");
    $stmt->bind_param("ss", $email, $hash);
    $stmt->execute();

    header("Location: register.php");
}
?>

<form method="POST">
    <h2>Создать аккаунт</h2>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="password" name="password2" placeholder="Повтор пароля" required><br>
    <button type="submit">Создать</button>
</form>
