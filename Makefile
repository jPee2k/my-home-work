install:
	npm ci
	composer install

test:
	npm test

lint:
	npx eslint .

lint-fix:
	npx eslint --fix .

publish:
	npm publish --dry-run

link:
	npm link
