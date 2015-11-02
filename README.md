# Ao-Alert
Resources for Alerts with Laravel 5.1

## 1) installation
````
$ composer require alex-oliveira/ao-alert:dev-master
````

## 2) config/app.php
````
'providers' => [
    /*
     * Vendors Service Providers...
     */
    AoAlert\AlertServiceProvider::class,
],
'aliases' => [
    /*
     * Vendors Facades
     */
    'Alert' => AoAlert\AlertFacade::class,
],
````

# Using
````
Alert::get() = alert()->get();
````

````
alert()->info('info message');
alert()->success('success message');
alert()->warning('warning message');
alert()->danger('danger message');
````

````
alert()->info('info message')->success(['message a', 'message b', 'message c']);
````

````
alert()->show()->cls();
````