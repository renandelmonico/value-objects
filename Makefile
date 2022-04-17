test-mutation:
	docker run -it --rm -v $(shell pwd):$(shell pwd) -w=$(shell pwd) value-objects bash -c 'vendor/bin/infection'

test-unit:
	docker run -it --rm -v $(shell pwd):$(shell pwd) -w=$(shell pwd) php:8.1 bash -c 'vendor/bin/phpunit'

composer-install:
	docker run --rm --interactive --tty --volume $(shell pwd):/app composer install

docker-build-image:
	docker build -t value-objects .
