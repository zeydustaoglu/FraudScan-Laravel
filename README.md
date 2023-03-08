# Laravel_fraud_assessment

Version 0.1.0

An app for scanning all customers and finding fraudulent ones.

![Alt text](/public/images/fraudScan.png "FraudSCan")


## The Api
This app integrated with API from Docker Image vzdeveloper/customers-api

## Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

## Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

## Tailwind CSS
To start build process
```
npm run dev
```

## Running The App
```
php artisan serve
```