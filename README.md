## Test Project

To complete this test project, follow the instructions for setting up your local development environment and implement the functionality described below. The purpose of this project is to allow you to demonstrate your ability to work on a Laravel / Vuejs app. We will mainly be looking at how you implement the desired functionality, so don't worry too much about styling the front end.

### Environment Setup

1. Clone the repository
```
git clone git@bitbucket.org:resoundcreative-dev/test-project.git
```
2. Install required composer and npm packages
```
composer install

npm install
```
3. Create your .env file and then setup your database
```
cp .env.example .env
```
4. Generate application key
```
php artisan key:generate
```
5. Run the database migrations
```
php artisan migrate
```
6. Serve the Laravel app
```
php artisan serve
```
7. Compile the front end code
```
npm run watch
```
### Development Tasks To Complete

You will be working on a simple Todo app using Laravel and Vuejs. This should be a Single Page Application built in Vuejs that interacts with the Laravel backend through an API. The basic skeleton of the application has been set up for you. There are only a few specific development tasks you will need to complete.

#### Front End Development
1. Implement the Login page (/resources/js/pages/LoginPage.vue)
2. Implement the Registration page (/resources/js/pages/RegisterPage.vue)
3. Implement the Todo Dashboard page (/resources/js/pages/authenticated/TodoDashboardPage.vue) Specific instructions for the desired functionality can be found on that page.

#### Back End Development
1. Implement the necessary methods in the Todo Controller (/app/Http/Controllers/Api/TodoController.php)

### Project Submission
Once you have completed development, you can submit your code in one of two ways:

1. Commit your changes to your own public git repository that we can clone
2. Bundle your code into a zip file and send it to us
