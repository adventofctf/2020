FROM php:7.3-apache

# Install packages
ENV DEBIAN_FRONTEND noninteractive

MAINTAINER Arjen 'credmp' Wiersma

RUN apt-get update
RUN apt-get install -y supervisor && apt-get clean

ADD run.sh /run.sh
ADD flag.txt /flag.txt
ADD start-apache2.sh /start-apache2.sh
ADD supervisord-apache2.conf /etc/supervisor/conf.d/supervisord-apache2.conf
RUN chmod 755 /*.sh

RUN mkdir -p /var/www/html/error_pages
COPY 403.html /var/www/html/error_pages/

COPY site.conf /etc/apache2/sites-enabled/000-default.conf

COPY src/* /var/www/html/

RUN chown -R www-data:www-data /var/www

EXPOSE 80
CMD ["/run.sh"]
