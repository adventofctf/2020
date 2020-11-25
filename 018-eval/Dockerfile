FROM node:lts-jessie

MAINTAINER Arjen 'credmp' Wiersma

RUN apt-get update
RUN apt-get install -y supervisor && apt-get clean

ADD run.sh /run.sh
ADD start-npm.sh /start-npm.sh
ADD supervisord-npm.conf /etc/supervisor/conf.d/supervisord-npm.conf
RUN chmod 755 /*.sh

WORKDIR /opt/app

COPY package.json .
RUN npm install

COPY src/ .

RUN chown -R node:node /opt/app
RUN chmod -R a-w /opt/app
RUN chmod -R 400 /opt/app/flag.txt
RUN chmod -R 400 /opt/app/server.js

EXPOSE 8080
#ENTRYPOINT ["npm", "start"]
CMD ["/run.sh"]
