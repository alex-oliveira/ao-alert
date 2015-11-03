# Ao-Alert
Resources for Alerts with Laravel 5.1 + Bootstrap 3

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

## 3) Using
Showing alerts in your template or view.
````
{!! alert()->show() !!}
````

Add new messages in session.
````
alert()->info('message');
alert()->success('message');
alert()->warning('message');
alert()->danger('message');
````

Add multiple messages.
````
alert()->info(['message a', 'message b', 'message c']);
````

Add message with multiple topics.
````
alert()->danger('message', ['topic a', 'topic b', 'topic c']);
````

Add new custom messages in session.
````
/* CSS */
.alert-custom{
    background: #ccc
}

/* PHP */
alert()->add('alert-custom', 'message');
````
