```php
<?php

// Подключение к конфигурации базы данных
require '../config.php';

// Установка заголовка для ответа в формате JSON
header('Content-Type: application/json');

// Проверка, что метод запроса POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение и декодирование входящих JSON-данных
    $data = json_decode(file_get_contents('php://input'), true);

    // Проверка наличия необходимых данных (id пользователя и сообщение)
    if (!isset($data['user_id'], $data['message'])) {
        // Отправка ошибки, если данных недостаточно
        echo json_encode(['error' => 'Недостаточно данных']);
        exit;
    }

    // Подготовка и выполнение SQL-запроса для вставки сообщения в базу данных
    $stmt = $pdo->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $stmt->execute([$data['user_id'], $data['message']]);
    // Отправка успешного ответа
    echo json_encode(['success' => true]);
} else {
    // Обработка GET-запроса: выборка всех сообщений из базы данных
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
    // Отправка результатов выборки в формате JSON
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
?>
```
