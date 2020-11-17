FROM node:lts-jessie

MAINTAINER Arjen 'credmp' Wiersma

# Create app directory
WORKDIR /root/app

COPY package.json .
RUN npm install

COPY src/ .

EXPOSE 8080
ENTRYPOINT ["npm", "start"]
