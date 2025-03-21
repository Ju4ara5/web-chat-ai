// Пример кода с исправленным механизмом очереди
$updateUnreadQuery = "UPDATE messages SET unread = FALSE WHERE chat_id = ? AND sender != ?";
