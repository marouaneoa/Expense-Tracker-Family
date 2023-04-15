# Expense Tracker Family Challenge

## Run Locally

Clone the project

```bash
  git clone https://github.com/marouaneoa/Expense-Tracker-Family.git
```

Go to the project directory

```bash
  cd project-directory
```

- Copy .env.example file to .env and **edit database credentials there**

- Install Laravel files

```bash
    composer update
```

- Generate APP_KEY

```bash
    php artisan key:generate
```
- Create the database tables (with seeding)

```bash
    php artisan migrate:fresh --seed
```
- Then:
```bash
    php artisan serve
```
## To test

- Login to:

- Email = admin@example.com
- Password = admin

**In Case you face problems with ```composer update``` check **php**.ini files and uncomment the needed extensions such as**

```
extension=pdo_mysql
extension=mysqli
extension=fileinfo
extension=curl
```
