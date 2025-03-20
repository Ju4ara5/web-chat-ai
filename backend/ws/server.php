```php
<?php

// Подключение к конфигурации базы данных
require '../config.php';

// Создание TCP-сокета на порту 8080
// Если сокет не создан, выводим сообщение об ошибке
$socket = stream_socket_server("tcp://0.0.0.0:8080", $errno, $errstr);
if (!$socket) {
    die("Ошибка сокета: $errstr ($errno)\n");
}

// Массив для хранения подключенных клиентов
$clients = [];

// Бесконечный цикл для обработки входящих соединений
while ($conn = stream_socket_accept($socket)) {
    // Добавляем нового клиента в массив
    $clients[] = $conn;
    // Чтение данных от клиента
    $data = fread($conn, 1024);
    // Декодирование JSON-данных в массив
    $message = json_decode($data, true);

// Проверка, что в сообщении есть идентификатор пользователя и текст сообщения
    if (isset($message['user_id'], $message['message'])) {
        // Подготовка и выполнение SQL-запроса для вставки сообщения в базу данных
        $stmt = $pdo->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
        $stmt->execute([$message['user_id'], $message['message']]);

        // Отправка полученного сообщения всем подключенным клиентам
        foreach ($clients as $client) {
            fwrite($client, json_encode(["user_id" => $message['user_id'], "message" => $message['message']]));
        }
    }
}
?>
```
