# Forstrap

Forstrap is a Laravel 8 authentication boilerplate using Fortify package and stylized with Bootstrap 5 CSS framework without the complexity of Jetstream and TailwindCSS and extends Laravel Fortify base features.

## How To Use This?

Run this command below where app is the folder you want to create your project with.

```shell

composer create-project mkfizi/forstrap app

```
Run this command after you change you **.env** file

```shell

php artisan migrate

```

That's it! Your new app is now ready with authentication features

### Email Configuration
In order to experience the complete Laravel Fortify and Forstrap authentication features, you must set your email configuration in **.env** file.  You may use [mailtrap.io](https://mailtrap.io/) for development purpose and use it's SMTP integration codes in you **.env** file.

## Extended Feature

Aside from the out of the box Fortify's authentication features, this boilerplate also came with an extended feature which enables the application to send the two factor recovery codes to user's email address. 

### Folder Structure
The files for this features can be located in these folders
```shell
App
|Http
|-Controllers
|--EmailController.php
|Mail
|-TwoFactorRecoveryCodes.php
Resources
|Views
|-Emails
|--two-factor-recovery-codes.blade.php
```

### Route
The route for this feature can be located in web.php with this line
```shell
Route::post('/user/two-factor-recovery-codes/email', 'App\Http\Controllers\EmailController@sendTwoFactorRecoveryCodes')->name('two-factor-recovery-codes.send');
```