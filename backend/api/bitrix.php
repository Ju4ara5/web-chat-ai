```php
<?php
require '../config.php';

// Функция для создания сделки в Bitrix24
function createDeal($userId, $message) {
    $bitrixWebhook = 'https://your-bitrix24.com/rest/1/your_webhook_url/crm.deal.add.json';

    $data = [
        'fields' => [
            'TITLE' => 'Новая заявка от пользователя ' . $userId,
            'COMMENTS' => $message,
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $bitrixWebhook);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
?>
```
