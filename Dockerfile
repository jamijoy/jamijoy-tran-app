
# BR23 - EXAM - OCT 12


# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application code into the container
COPY . /var/www/html

# Install any additional PHP extensions or packages required by your application
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the port your web server listens on (typically 80 for Apache)
EXPOSE 80

# Define an environment variable (optional)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Configure Apache to use your document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/default-ssl.conf

# Enable Apache mod_rewrite (if needed for URL rewriting)
RUN a2enmod rewrite

# Set PHP configuration (e.g., timezone)
RUN echo "date.timezone = America/New_York" > /usr/local/etc/php/php.ini

# Start the Apache web server when the container starts
CMD ["apache2-foreground"]

EXPOSE 3000