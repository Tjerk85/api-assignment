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

## Usage

To show all delivery options available:
http://localhost:88/api/delivery-options

### query parameters:<br/>
#### country:
country options:<br/>
- NL
- BE
- EU
- ROW (Rest Of World)
<br/>
<br/>

#### package-type:
package-type options:
- Standard
- Mailbox
- Pallet
  <br/>
  <br/>

#### shipment-date:
shipment-date options:
- Day-month-year > 17-08-2024
  <br/>
  <br/>

#### Example with combined query parameters:<br/>
http://localhost:88/api/delivery-options?country=nl&package-type=pallet&shipment-date=17-08-2024
