# LANGUAGES = en pt_BR

run: install
	@php artisan serve

install: vendor node_modules .env

node_modules: package.json
	@rm -rf node_modules
	@npm install

vendor: composer.json composer.lock
	@rm -rf vendor
	@composer install

.env:
	@make vendor
	@cp .env.example .env
	@php artisan key:generate --ansi

ide-helper: vendor
	@php artisan ide-helper:generate
	@php artisan ide-helper:models -N

# translation-files:
# 	@for dir in $(LANGUAGES); do echo "<?php \n\nreturn [\n\t'' => ''\n];" > ./lang/$$dir/$(name).php; done
# 	@for dir in $(LANGUAGES); do echo "Criando arquivo ./lang/$$dir/$(name).php"; done

clear:
	@rm -rf node_modules vendor _ide_helper*.php
