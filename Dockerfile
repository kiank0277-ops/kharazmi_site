FROM php:8.2-apache

# فعال کردن mod_rewrite
RUN a2enmod rewrite

# تنظیم AllowOverride برای Apache
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# کپی کردن فایل‌ها
COPY . /var/www/html/

# تغییر مالکیت و دسترسی
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# باز کردن پورت 80
EXPOSE 80
