# rest-api-task

1. Clone repository - `git clone https://github.com/trndo/rest-api-task.git`
2. Install dependencies - `composer install`
3. Create .env.local and copy .env data to it - `cp .evn .env.local`
4. Fill DATABASE_URL in .env.local with your DB credentials
5. Create database - `bin/console doctrine:database:create`
6. Run migrations - `bin/console doctrine:migrations:migrate`
7. (Optional)Run fixtures - `php bin/console doctrine:fixtures:load`

#prod
1. Clone repository - `git clone https://github.com/trndo/rest-api-task.git`
2. Install dependencies - `composer install --no-dev --optimize-autoloader --classmap-authoritative`
3. Create .env.local and copy .env data to it - `cp .evn .env.local`
4. Fill DATABASE_URL in .env.local with your DB credentials
5. Configure environment variables
    `APP_ENV=prod
     APP_DEBUG=0
     APP_SECRET=<generated-secret>`
6. Create database - `bin/console doctrine:database:create`
7. Run migrations - `bin/console doctrine:migrations:migrate`

If you want to apply dump instead of run migrations - `mysql -u username -p database_name < db_class.sql` 


