FROM ubuntu

# Install packages
ENV DEBIAN_FRONTEND noninteractive

MAINTAINER Arjen 'credmp' Wiersma

RUN apt-get update
RUN echo "postfix postfix/mailname string rundeck.example.com" | debconf-set-selections && echo "postfix postfix/main_mailer_type string 'Internet Site'" | debconf-set-selections && apt-get install -y postfix
RUN apt-get install -y apache2 libapache2-mod-evasive supervisor fail2ban && apt-get clean

COPY evasive.conf /etc/apache2/mods-enabled/evasive.conf
COPY fail2ban-filter.conf /etc/fail2ban/filter.d/apache-forbidden.conf
COPY jail.conf /etc/fail2ban/jail.conf

ADD run.sh /run.sh
ADD start-apache2.sh /start-apache2.sh
ADD supervisord-apache2.conf /etc/supervisor/conf.d/supervisord-apache2.conf
ADD supervisord-fail2ban.conf /etc/supervisor/conf.d/supervisord-fail2ban.conf
RUN chmod 755 /*.sh

RUN mkdir -p /var/www/html/error_pages
COPY 403.html /var/www/html/error_pages/

COPY site.conf /etc/apache2/sites-enabled/000-default.conf

COPY src/index.html /var/www/html/

EXPOSE 80
CMD ["/run.sh"]
