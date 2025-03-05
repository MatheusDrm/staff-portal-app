# Usa a imagem oficial do PHP com Apache
FROM php:8.0-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do backend para o servidor Apache
COPY . /var/www/html/

# Define permissões corretas
RUN chown -R www-data:www-data /var/www/html/

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

EXPOSE 80
CMD ["apache2-foreground"]
