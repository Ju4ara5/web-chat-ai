import React, { useState } from "react";
import WebSocketClient from "../services/websocket";

// Компонент для ввода сообщений
const InputBox = () => {
  const [message, setMessage] = useState("");

  // Функция отправки сообщения
  const sendMessage = () => {
    if (message.trim()) {
      WebSocketClient.sendMessage({ text: message, user: "me" });
      setMessage(""); // Очищаем поле ввода
    }
  };

  return (
    <div className="input-box">
      <input
        type="text"
        value={message}
        onChange={(e) => setMessage(e.target.value)}
        placeholder="Введите сообщение..."
      />
      <button onClick={sendMessage}>Отправить</button>
    </div>
  );
};

export default InputBox;
