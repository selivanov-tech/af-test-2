composer-install:
	@docker compose run -ti --rm php composer install

composer-require:
	@docker compose run -ti --rm php composer require $(package)

composer-update:
	@docker compose run -ti --rm php composer update

tests-http:
	docker run -ti --rm -v $(PWD):/workdir jetbrains/intellij-http-client \
		--env-file ./http/http-client.env.json --env local \
		-D ./http/v0/run.http

# todo:
#phpstan:
#	@docker compose run -ti --rm php vendor/bin/phpstan analyze -v --memory-limit=1024M $$(git --no-pager diff --diff-filter=d --name-only --cached main -- '**.php')
#
#phpstan-full:
#	@docker compose run -ti --rm php vendor/bin/phpstan analyze -v --memory-limit=1024M .
#
#phpcs:
#	@docker compose run -ti --rm php php -d memory_limit=1G vendor/bin/phpcs -s -p $$(git --no-pager diff --diff-filter=d --name-only --cached main -- '**.php')
#
#phpcs-full:
#	@docker compose run -ti --rm php php -d memory_limit=1G vendor/bin/phpcs -s -p
#
#phpcs-fix:
#	@docker compose run -ti --rm -e apache vendor/bin/phpcbf -s -p $$(git --no-pager diff --diff-filter=d --name-only --cached main -- '**.php')
