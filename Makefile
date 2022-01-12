install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./src/Games/brain-even

brain-calc:
	./src/Games/brain-calc

brain-gcd:
	./src/Games/brain-gcd

brain-progression:
	./src/Games/brain-progression

brain-prime:
	./src/Games/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

update:
	composer update
