# Ao-Alert
Resources for Alerts with Laravel 5.1

## 1) Installation
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

## 3) Template
````
{!! alert()->show()->cls() !!}
````

# Using
Get message list of session
````
Alert::get()
// equals
alert()->get();
````

Add new messages in session
````
alert()->info('info message');
alert()->success('success message');
alert()->warning('warning message');
alert()->danger('danger message');
````

Add message with topic list
````
alert()->danger('message')->success(['topic a', 'topic b', 'topic c']);
````