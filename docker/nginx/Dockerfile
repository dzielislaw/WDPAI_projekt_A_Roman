#FROM nginx:1.17.8-alpine
FROM nginx:1.25.3-alpine
# Copy the public directory
# COPY ./public/ /app/public/
COPY . /app/

# Copy the nginx config file
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf


COPY ./docker/nginx/library.crt /etc/nginx/ssl/library.crt
COPY ./docker/nginx/library.key /etc/nginx/ssl/library.key