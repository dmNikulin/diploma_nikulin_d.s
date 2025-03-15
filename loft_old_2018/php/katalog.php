<?php 

// Извлекаем данные из формы
$tel = htmlspecialchars ($_POST['phone']);
$name = htmlspecialchars ($_POST['name']);

//*  Запись в тектовый файл */
$file = "contact.csv";
$contact = $source. ";" .$campaign. ";" .$content. ";" .$medium. ";" .$term. ";" .$email. ";" .$tel. ";" .$name. ";" . "\n";
file_put_contents($file, $contact, FILE_APPEND);


// Формируем заголовки письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html;charset=utf-8 \r\n";
$headers .= "From: Администратор newloftspb.ru <mail@newloftspb.ru>\r\n";
$headers .= "Reply-To:mail@newloftspb.ru\r\n";

// Составляем текст письма админу
$message = "<p>Клиент скачал каталог</p>
<p>Телефон клиента: $tel</p>
<p>Имя клиента: $name</p>";

// Отсылаем письмо админу
mail( "mail@newloftspb.ru", "Новая заявка, скачен каталог.", $message, $headers );

// Отправляем пользователя на страницу "Спасибо"
header( "Location: ../thanks.html");
?>