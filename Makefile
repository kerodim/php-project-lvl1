install:
	composer install
	composer install --prefer-dist --no-progress --no-suggest

lint:
	composer run-script phpcs -- --standard=PSR12 src bin
