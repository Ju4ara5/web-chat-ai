
class WebSocketClient {
  constructor(url) {
    this.socket = new WebSocket(url); // Создаем WebSocket-соединение
    this.listeners = []; // Список функций-обработчиков входящих сообщений

    // Обрабатываем входящие сообщения
    this.socket.onmessage = (event) => {
      const message = JSON.parse(event.data); // Парсим JSON-данные
      this.listeners.forEach((listener) => listener(message)); // Вызываем все зарегистрированные обработчики
    };
  }

  // Отправка сообщения через WebSocket
  sendMessage(message) {
    this.socket.send(JSON.stringify(message));
  }

  // Регистрация нового обработчика входящих сообщений
  addMessageListener(callback) {
    this.listeners.push(callback);
  }
}

export default new WebSocketClient("ws://localhost:8080"); // Экспортируем экземпляр WebSocket-клиента

