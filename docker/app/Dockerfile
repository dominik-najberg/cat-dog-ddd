FROM webdevops/php-dev:8.2

# Arguments defined in docker-compose.yml
ARG uid
ARG gid

# Install system dependencies
RUN apt-get update && apt-get install -y \
   git \
   curl \
   libpng-dev \
   libonig-dev \
   libxml2-dev \
   zip \
   unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Xdebug
RUN pecl install xdebug-3.2.2 \
    && docker-php-ext-enable xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create group and system user with specified UID and GID
RUN groupadd -g $gid symfony \
   && useradd -u $uid -g $gid -G www-data,root -d /home/symfony symfony \
   && mkdir -p /home/symfony/.composer \
   && chown -R symfony:symfony /home/symfony

# Set working directory
WORKDIR /var/www

USER symfony
