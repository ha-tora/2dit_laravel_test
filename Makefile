include .env

start:
	make build up expand

build:
	cp -n .env.example .env
	sudo docker compose build

up:
	sudo docker compose up -d

down:
	sudo docker compose down

migrate:
	sudo docker compose exec php php artisan migrate

expand:
	sudo docker compose exec php composer install
	sudo docker compose exec php php artisan key:generate
	sudo docker compose exec php php artisan config:cache
	make migrate