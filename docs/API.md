# API веб-чата

## Авторизация
`POST /api/auth.php`
- **Параметры**: email, пароль
- **Ответ**: `{ "token": "jwt-token" }`

## Чат
`GET /api/chat.php?chat_id={id}`
- **Ответ**: `[ { "message": "Привет!", "sender": "bot" } ]`

`POST /api/chat.php`
- **Параметры**: message, chat_id
- **Ответ**: `{ "status": "sent" }`

## Bitrix24
`POST /api/bitrix.php`
- **Параметры**: user_id, deal_data
- **Ответ**: `{ "status": "updated" }`
