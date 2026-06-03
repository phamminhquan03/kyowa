FROM php:8.3-fpm

# Cài đặt dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy code
COPY . .

# Cài Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Xóa config Nginx mặc định để tránh duplicate
RUN rm -f /etc/nginx/sites-enabled/default /etc/nginx/sites-available/default

# Copy config Nginx của chúng ta
COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

# Chạy PHP-FPM và Nginx
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]