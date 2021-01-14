#variable
PHP			=php
SYMFONY		=$(PHP)	bin/console
COMPOSER	=composer
BREW		=brew
HTTP_PORT	=8000

#command
help:	##Show all avaiable command
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

install:	composer.lock	composer.json	## Install vendors according to the current composer.lock file
	$(COMPOSER) install
	$(COMPOSER) require symfony/web-server-bundle 4.4

cert-install: ## Install the local HTTPS certificates
	$(SYMFONY) server:ca:install

serve: ## Serve the application with HTTPS support
	$(SYMFONY) server:run

unserve: ## Stop the webserver
	$(SYMFONY) server:stop

load-fixtures: ## Build the DB, control the schema validity, load fixtures and check the migration status
	$(SYMFONY) doctrine:cache:clear-metadata
	$(SYMFONY) doctrine:database:create --if-not-exists
	$(SYMFONY) doctrine:schema:drop --force
	$(SYMFONY) doctrine:schema:create
	$(SYMFONY) doctrine:schema:validate
	$(SYMFONY) hautelook:fixtures:load --no-interaction
sf: ## List all Symfony commands
	$(SYMFONY)

cc: ## Clear the cache. DID YOU CLEAR YOUR CACHE????
	$(SYMFONY) c:c

warmup: ## Warmup the cache
	$(SYMFONY) cache:warmup

fix-perms: ## Fix permissions of all var files
	chmod -R 777 var/*

assets: purge ## Install the assets with symlinks in the public folder
	$(SYMFONY) assets:install public/ --symlink --relative

purge: ## Purge cache and logs
	rm -rf var/cache/* var/logs/*

php-upgrade: ## Upgrade PHP to the last version
	$(BREW) upgrade php

php-set-7-3: ## Set php 7.3 as the current PHP version
	$(BREW) unlink php
	$(BREW) link --overwrite php@7.3

php-set-7-4: ## Set php 7.4 as the current PHP version
	$(BREW) unlink php
	$(BREW) link --overwrite php@7.4

php-set-8-0: ## Set php 8.0 as the current PHP version
	$(BREW) unlink php
	$(BREW) link --overwrite php@8.0
git:	##pusht to dev branch
	git add .
	git commit -m 'new feature- minor bug'
	git push