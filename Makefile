install:
	npm ci
	composer install

update:
	npm update
	composer update

test:
	npm run test-windows

lint:
	npx eslint ./src/Hexlet/JS/

lint-fix:
	npx eslint --fix ./src/Hexlet/JS/

publish:
	npm publish --dry-run

link:
	npm link
