# Контейнеризация проекта
# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем расширения и зависимости
RUN docker-php-ext-install pdo pdo_pgsql

# Копируем файлы проекта
COPY backend/ /var/www/html/

# Устанавливаем права на файлы
RUN chown -R www-data:www-data /var/www/html/

# Открываем порт 80
EXPOSE 80

# Запуск Apache
CMD ["apache2-foreground"]
