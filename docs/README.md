# Установка и настройка веб-чата

## Требования
- PHP 8+
- PostgreSQL
- Node.js 18+
- Docker и Docker Compose (для контейнеризации)

## Установка
1. Склонируйте репозиторий:
   ```sh
   git clone https://github.com/your-repo/web-chat-ai.git
   ```
2. Установите зависимости бэкенда:
   ```sh
   cd backend && composer install
   ```
3. Установите зависимости фронтенда:
   ```sh
   cd frontend && npm install
   ```
4. Настройте `.env` файлы.
5. Запустите сервер и клиент:
   ```sh
   docker-compose up --build