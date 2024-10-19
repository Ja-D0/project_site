make run:
	docker-compose up --build -d && docker-compose logs -f

make exec_app:
	docker-compose exec php_app bash