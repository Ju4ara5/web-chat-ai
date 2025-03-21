import React from "react";
import ChatWindow from "../components/ChatWindow";

// Основная страница чата
const ChatPage = () => {
  return (
    <div className="chat-page">
      <h2>Веб-чат с AI</h2>
      <ChatWindow />
    </div>
  );
};

export default ChatPage;
