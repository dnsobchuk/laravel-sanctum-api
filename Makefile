init: docker-down docker-pull docker-build docker-up laravel-init
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

laravel-init: laravel-composer-install

laravel-composer-install:
	docker-compose run --rm laravel-php-cli composer install --prefer-dist
