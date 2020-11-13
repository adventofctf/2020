FROM node:alpine

MAINTAINER Arjen 'credmp' Wiersma

RUN apk add --no-cache bash

WORKDIR /apps

RUN npm install express@4.15.2
RUN npm install socket.io
RUN npm install btoa
RUN npm install atob

ADD flag.txt /flag.txt
RUN chmod a-wx /flag.txt

ADD src/do_check.sh /apps/
RUN chmod +x /apps/do_check.sh
ADD src/index.html /apps/
ADD src/server.js /apps/
ADD src/do_check.sh /apps/

EXPOSE 3000

USER node
ENTRYPOINT ["node", "server.js"]
