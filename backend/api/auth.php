// Аутентификация через WordPress

```php
<?php
require '../config.php';
require_once('../../../wp-load.php');
header('Content-Type: application/json');

// Обрабатываем POST-запрос для входа пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $user = wp_authenticate($data['email'], $data['password']);

    if (is_wp_error($user)) {
        echo json_encode(['error' => 'Неверные учетные данные']);
        exit;
    }

    // Устанавливаем сессию пользователя
    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID);
    echo json_encode(['success' => true, 'user' => $user->user_login]);
} else {
    echo json_encode(['error' => 'Метод запроса не поддерживается']);
}
?>
```
