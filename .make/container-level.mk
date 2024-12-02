# todo: divide to two commands: start and build
start:
	@docker compose --project-name=${COMPOSE_PROJECT_NAME} up --build -d

stop:
	@docker compose --project-name=${COMPOSE_PROJECT_NAME} down

restart:
	@make -s stop && make -s start

build:
	@docker compose build --no-cache

cli:
	@docker compose --project-name=${COMPOSE_PROJECT_NAME} exec php bash

logs:
	@docker compose logs --tail=100 php

# todo:
#update-image:
#	@docker pull --platform linux/amd64 ghcr.io/selivanov-tech/symfony-micro-${PHP_VERSION}:dev
