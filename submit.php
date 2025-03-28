<?php
$pdo = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

$fio = $_POST['fio'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$bio = $_POST['bio'];
$languages = $_POST['languages'];
$agree = isset($_POST['agree']) ? 1 : 0;


if (!preg_match("/^[\p{L} ]+$/u", $fio)) {
    die("ФИО должно содержать только буквы и пробелы.");
}


$stmt = $pdo->prepare("INSERT INTO users (fio, phone, email, birthdate, gender, bio, agree) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$fio, $phone, $email, $birthdate, $gender, $bio, $agree]);

$user_id = $pdo->lastInsertId();
foreach ($languages as $lang) {
    $stmt = $pdo->prepare("INSERT INTO user_languages (user_id, language) VALUES (?, ?)");
    $stmt->execute([$user_id, $lang]);
}

echo "Данные успешно сохранены!";
?>
