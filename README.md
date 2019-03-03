# Pastebin backend

## Setup
Clone this and the pastebin-frontend repository in the same root directory.
Tree:
```
.
├── pastebin-backend
├── pastebin-frontend
```

- Follow instructions in `pastebin-frontend`
- Assure you're in `pastebin-backend`
- Run `cp docker.env.dist docker.env`
- Fill in the desired database credentials
- Run `cp .env.example .env`
- Set the correct database credentials in .dev
- Set correct CORS configuration, for dev: `ALLOW_CORS_ORIGINS="http://localhost:8080"`
- Run `cp docker-compose.local.yml.dist docker-compose.local.yml` and modify the ports if desired
- Start containers
  - Production: Bring containers up: `docker-compose -f docker-compose.yml -f docker-compose.local.yml up`
  - Development: `docker-compose -f docker-compose.yml -f docker-compose.dev.yml -f docker-compose.local.yml up` for development
- Install dependencies: `docker exec -w /code -it $(docker-compose ps | grep php | awk '{print $1}') /bin/composer install`
- Generate key for Laravel: `./console key:generate`
- Migrate database: `./docker-artisan migrate`
- Seed database: `./docker-artisan db:seed`

## Tests
Run tests:
`docker exec -w /code -it $(docker-compose ps | grep php | awk '{print $1}') vendor/bin/phpunit`