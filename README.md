# Project-2-Resit

# Full installation of Service IT web-system



## Step 1: Importing the database in phpMyAdmin

1. Create a new database and name it service_it
2. Import the database named service_it.sql
3. Open Index folder and run index.php.

## Step 2: Create a new user using registration form in registration.php
## Step 3: Log In with the previously created credentials
   Step3.1: To log in the admin page the credentials are
   Email : admin@gmail.com
   Password: aa

# Features of Service IT:
1. PHP Mailer feature send an email with PDF to the user
2. Admin is able to see:
    - View all the services, Edit and Delete services
    - Add a new service
    - Add new admins
    - View all the request services, change status in DONE or PROGRESS
    - View all the tickets, change status in DONE or PROGRESS
    - View all tickets in ascendent order
    - View all tickets in descendent order
    - View all the customers
   
3. The logged user is able to see:
    - To see all the services that the company has.
    - The user can request a service
    - The user can ope a ticket based on a certain service.
    - Download the contract for a service required(You need to have Mozilla to download id)
    - He can see the contract in a PDF format through is Email. We are using PHPMailer so the user will receive an email with a PDF contract which has information like:
        - The name, the service selected, email and the phone number.
