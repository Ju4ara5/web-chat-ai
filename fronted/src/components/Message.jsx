import React from "react";

// Компонент сообщения в чате
const Message = ({ text, user }) => {
  return (
    <div className={`message ${user === "me" ? "my-message" : "other-message"}`}>
      <span className="user">{user}:</span>
      <span className="text">{text}</span>
    </div>
  );
};

export default Message;
