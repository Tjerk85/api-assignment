## Setup
Run the following commands:

```bash
cp .env.example .env
```

```bash
docker compose up -d
```

```bash
docker compose exec -it php composer install
```

```bash
docker compose exec -it artisan 
```
Check if on ```localhost:88``` you can see the standard laravel welcome page.
