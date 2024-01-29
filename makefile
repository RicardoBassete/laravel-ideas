run: install
	php artisan serve

install: vendor node_modules

node_modules: package.json
	npm install

vendor: composer.json
	composer install

ide-helper: vendor
	composer run post-install-cmd

clear:
	rm -rf node_modules
	rm -rf vendor