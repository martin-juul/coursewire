docs:
	cd ./docs
	yarn build
	cd ..

install:
	composer install --no-dev --optimize-autoloader
