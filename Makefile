build:
	docker-compose up -d --build
	docker-compose exec php composer install
	cp .env.example .env
	docker-compose exec php php artisan key:generate
	docker-compose exec php php artisan migrate --seed
down:
	docker-compose down -v --remove-orphans
up:
	docker-compose up -d
bash:
	docker-compose exec php /bin/bash
queue:
	docker-compose exec php php artisan queue:work
test:
	docker-compose exec php vendor/bin/phpcs
	docker-compose exec php vendor/bin/phpunit --coverage-clover=coverage.clover

config-cache:
	docker-compose exec php php artisan config:cache
ide:
	docker-compose exec php php artisan ide-helper:model
migrate:
	docker-compose exec php php artisan migrate
init: build queue
