test-mutation:
	docker run -it --rm -v $(shell pwd):$(shell pwd) -w=$(shell pwd) value-objects bash -c 'vendor/bin/infection'

test-unit:
	docker run -it --rm -v $(shell pwd):$(shell pwd) -w=$(shell pwd) php:8.1 bash -c 'vendor/bin/phpunit'

test-coverage:
	docker run -it --rm -v $(shell pwd):$(shell pwd) -w=$(shell pwd) value-objects bash -c 'vendor/bin/phpunit --coverage-html=coverage'

composer-install:
	docker run --rm --interactive --tty --volume $(shell pwd):/app composer install

doc-generate:
	docker run --rm -v $(shell pwd):/data phpdoc/phpdoc run -d src --sourcecode --visibility=public,protected --title=renandelmonico/value-objects

docker-build-image:
	docker build -t value-objects .
