db-init:
	@docker compose exec php php bin/console doctrine:database:create --if-not-exists
	@docker compose exec php php bin/console doctrine:schema:update --force

db-migrate:
	@docker compose exec php php bin/console doctrine:migrations:migrate --no-interaction
