# Investment Script
This is a robust investment system with a powerful admin panel.

## Features
- User Panel
- Admin Panel
- Deposits
- Withdrawals
- Wallet Top Up
- Investment
- Automatic return on investments and investment status change
- Registration, Deposit, Withdrawal and Investment notifications to both admin and users.
- Currency change and site customization from admin panel.

## Deployment
To deploy to a live server, clone this repo with

```
git clone https://github.com/Benzics/investment.git
```
Rename **.env.example** to **.env** and replace contents with server configurations.
Then 
```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```
And you're ready to go.

