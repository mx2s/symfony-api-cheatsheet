# symfony-api-cheatsheet

# Contribution
Thanks for considering contributing to this repo! Any refactoring / improvements / updating wiki or any other pull requests are welcome

### TODO:
- [x] Basic routing
- [x] Request validation
- [x] Object validation
- [ ] Research: model binding
- [ ] Model Relations
- [ ] Swagger Docs
- [ ] ...

## Set up
1. run `composer install`
2. create file .env.dev.local and add dbstring `DATABASE_URL=pgsql://dbuser:dbpass@127.0.0.1:5432/dbname`
3. start server by running `php bin/console server:start`
4. go to `localhost:8000` to see the result!

### Docs
for now docs available only as postman collections:
1. [Basics](https://raw.githubusercontent.com/mxss/symfony-api-cheatsheet/master/resources/docs/postman/Basics.postman_collection.json)
