# DHBW Summercamp

## Setup
1. `cp .env.example .env`
2. MySQL Datenbank Verbindung in `.env` eintragen
3. `composer install`
4. `bower install` (als root: `--allow-root`!)
5. `npm install` (unter Windows: `--no-bin-links`!)
6. `php artisan key:generate`
7. `gulp`

## Scripts
- `npm run dev` - Development Build
- `npm run prod` - Production Build

## Admin User
1. Datenbank Tabelle `users` in GUI öffnen
2. Neuen Eintrag erstellen
3. Passwort Hash auf [bcrypt Online Seite](https://www.dailycred.com/article/bcrypt-calculator) generieren
4. Hash in `password` Spalte eintragen
5. Spalte `role` auf `admin` setzen

## Deployment
1. `wget http://deployer.org/deployer.phar`
2. `mv deployer.phar /usr/local/bin/dep`
3. `chmod +x /usr/local/bin/dep`
4. `cp servers.example.yml servers.yml`
5. Zugangsdaten in `servers.yml` eintragen