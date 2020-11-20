FROM php:7.3-apache

# Install packages
ENV DEBIAN_FRONTEND noninteractive

MAINTAINER Arjen 'credmp' Wiersma

RUN apt-get update
RUN apt-get -y install supervisor zip unzip git mariadb-server pwgen && apt-get clean


RUN docker-php-ext-install mysqli pdo pdo_mysql

ADD start-mysqld.sh /start-mysqld.sh
ADD start-apache2.sh /start-apache2.sh
ADD run.sh /run.sh
ADD supervisord-mysqld.conf /etc/supervisor/conf.d/supervisord-mysqld.conf
ADD supervisord-apache2.conf /etc/supervisor/conf.d/supervisord-apache2.conf

# Remove pre-installed database
RUN rm -rf /var/lib/mysql/*

# Add MySQL utils
ADD database.sql /database.sql
ADD create_mysql_admin_user.sh /create_mysql_admin_user.sh
RUN chmod 755 /*.sh

RUN mkdir -p /var/www/html/error_pages
COPY 403.html /var/www/html/error_pages/

COPY site.conf /etc/apache2/sites-enabled/000-default.conf

COPY src/* /var/www/html/

RUN chown -R www-data:www-data /var/www
RUN chmod -R og-rw /var/www
RUN chown -R mysql:mysql /var/lib/mysql

EXPOSE 80 3306
CMD ["/run.sh"]
