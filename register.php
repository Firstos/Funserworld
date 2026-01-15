<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $role);
    $stmt->fetch();

    if ($id && password_verify($pass, $hash)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["role"] = $role;
        header("Location: index.php");
    } else {
        echo "Неверный логин или пароль";
    }
}
?>

<form method="POST">
    <h2>Вход</h2>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Войти</button>
</form>
