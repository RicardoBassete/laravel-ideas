run: install
	php artisan serve

install: vendor node_modules .env

node_modules: package.json
	npm install

vendor: composer.json
	composer install

.env:
	make vendor
	cp .env.example .env
	php artisan key:generate --ansi

ide-helper: vendor
	php artisan ide-helper:generate
	php artisan ide-helper:models -N

clear:
	rm -rf node_modules vendor
