install:
	npm ci
	composer install

update:
	npm update
	composer update

test:
	npm run test-windows

lint:
	npx eslint .

lint-fix:
	npx eslint --fix .

publish:
	npm publish --dry-run

link:
	npm link
