// Очередь сообщений

```php
<?php
require '../config.php';
require 'queries.php';

header('Content-Type: application/json');

// Подключение к базе данных
$conn = new PDO($dsn, $dbUser, $dbPassword);

// Получение сообщений из очереди
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->prepare("SELECT * FROM messages WHERE is_read = false ORDER BY created_at ASC");
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
}

// Обновление статуса сообщения (прочитано)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $conn->prepare("UPDATE messages SET is_read = true WHERE id = :id");
    $stmt->execute(['id' => $data['id']]);
    echo json_encode(['success' => true]);
}
?>
```
