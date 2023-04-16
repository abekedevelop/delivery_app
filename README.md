# kulan-oil-delivery-app

This is a test project of kulan-oil delivery app

# steps to start project locally

1) cp .env-example .env
2) docker-compose up -d //запуск контейнеров в фоновом режиме
3) docker exec -it delivery-app bash
4) composer install
5) php artisan key:generate
6) php artisan migrate
7) php artisan db:seed

