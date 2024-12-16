FROM php:7.4-apache

# Cài đặt các module cần thiết
RUN docker-php-ext-install pdo pdo_mysql

# Cài đặt MySQL Client
RUN apt-get update && apt-get install -y default-mysql-client

# Cấu hình thư mục làm việc
WORKDIR /var/www/html/

# Copy mã nguồn vào container
COPY . .

# Đảm bảo quyền truy cập
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (port mặc định của Apache)
EXPOSE 80

# Chạy Apache trong chế độ foreground
CMD ["apache2-foreground"]