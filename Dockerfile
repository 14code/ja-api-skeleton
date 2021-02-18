FROM php:7.4-cli-alpine
COPY . /app
WORKDIR /app
CMD [ "php", "-S", "0.0.0.0:8080", "-t" ,"./public/", "./public/index.php" ]