# syntax=docker/dockerfile:1.5

FROM node:latest AS build

# Specify working directory other than /
WORKDIR /var/www/client

# Copy only files required to install
# dependencies (better layer caching)
COPY package*.json ./

# Use cache mount to speed up install of existing dependencies
RUN npm install

COPY . .

RUN npm run build

# Use separate stage for deployable image
FROM nginx:stable-alpine

# Use COPY --link to avoid breaking cache if we change the second stage base image
COPY --link nginx.conf /etc/nginx/conf.d/default.conf

COPY --link --from=build var/www/client/dist/ /usr/share/nginx/html

EXPOSE 8080