
import React, { useState, useEffect } from "react";
import WebSocketClient from "../services/websocket";
import Message from "./Message";
import InputBox from "./InputBox";

const ChatWindow = () => {
  const [messages, setMessages] = useState([]); // Локальное состояние для хранения сообщений

  useEffect(() => {
    // Добавляем обработчик новых сообщений
    WebSocketClient.addMessageListener((message) => {
      setMessages((prevMessages) => [...prevMessages, message]); // Добавляем новое сообщение в список
    });
  }, []);

  return (
    <div className="chat-window">
      {/* Отображение списка сообщений */}
      <div className="messages">
        {messages.map((msg, index) => (
          <Message key={index} text={msg.text} user={msg.user} />
        ))}
      </div>
      {/* Поле ввода сообщения */}
      <InputBox />
    </div>
  );
};

export default ChatWindow;
