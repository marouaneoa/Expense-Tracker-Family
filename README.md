# Expense Tracker Family Challenge

## To Run Locally

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

## Features

- Users can add/edit/delete Income
- Users can Add/edit/delete Expenses
- Users can Add/edit/delete Categories (for both incomes and expenses)
  - Certainly each user has his own categories
  - There are built-in categories for the user **Admin** in order test (only accessible by user **Admin**)
- Users can Add/edit/delete Sub-users
- Users can Transfer funds to Sub-users and Sub-users can transfer to their parent user
  - When transferring between users and subusers, an expense named "Transfer to **receiverName**" will be created for the sender, and an income named "Transfer from **SenderName**" will be created for the receiver.
  - Also when transferring for the first time an expense category named **Transfers** will be created in the sender account, and an income category named **Transfers** will be created in the receiver account.
- Users can see their balance
  - Balance will be shown in both incomes and expenses pages
- Sub-users can see their balance.
  - Balance will be shown in both incomes and expenses pages
- User can see the global balance
  - The user will be able to see the global balance in the subusers section.

## Possible Errors

**In Case you never used Laravel in your machine, you might face problems with ```composer update``` or when migrating. To solve that check ```php.ini``` file and uncomment the needed extensions such as**

```ini
extension=pdo_mysql
extension=mysqli
extension=fileinfo
extension=curl
```
