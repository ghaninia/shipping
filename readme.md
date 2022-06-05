<div align="center">
<img src="./shipping.png" height="200" />
</div>

<h1 align="center">Calculate postage in Iran</h1>

<h3>Installation</h5>
<p>Go to the project root folder and run the following command</p>

```composer log
composer require ghaninia/shipping
```
<p>If you want to make sure the system is correct, Run tests🐱‍🚀</p>

```composer log
vendor\bin\phpunit 
```

<p>✔If you use package on laravel you should add below command to app.php <p>

```php 
### config/app.php
<?php
    ....
    'providers' => [
        ...
        GhaniniaIR\Shipping\ShippingServiceProvider::class, ### ✔
    ],
```

<p>Receive information of cities and provinces and their details</p>

```php
<?php 

use GhaniniaIR\Shipping\Core\Services\LocationService ;

### Get information on cities and provinces
(new LocationService())->list();

### Are the provinces adjacent to each other?
(new LocationService())
    ->source(State $state , City $city)
    ->destination(State $state , ?City $city)
    ->provincesNeighbors() ;

### Status of origin and destination together
(new LocationService())
    ->source(State $state , City $city)
    ->destination(State $state , ?City $city)
    ->situationStatesTogether() ; 

````

<p>Calculate Post <b>Pishtaz</b> Tariff</p>

```php
<?php

use GhaniniaIR\Shipping\Drivers\PishtazDriver;
use GhaniniaIR\Shipping\Models\State ;
use GhaniniaIR\Shipping\Models\City ;

$result = (new PishtazDriver())
    ->weight(int $productWeight)
    ->cost(int $productCost)
    ->source(State $sourceState , City $sourceCity)
    ->destination(State $sourceState , ?City $sourceCity)
    ->calculate();
```

<p>Calculate Post <b>Sefareshi</b> Tariff</p>

```php
<?php

use GhaniniaIR\Shipping\Drivers\SefarshiDriver;
use GhaniniaIR\Shipping\Models\State ;
use GhaniniaIR\Shipping\Models\City ;

$result = (new SefarshiDriver())
    ->weight(int $productWeight)
    ->cost(int $productCost)
    ->source(State $sourceState , City $sourceCity)
    ->destination(State $sourceState , ?City $sourceCity)
    ->calculate();
```

<hr />

<h3>Reconnection</h3>
<p>If you want to change the type of connection to the database, follow the code below</p>
<h5>Laravel:</h5>

```composer log
php artisan vendor:publish --tag:shipping --force
```

It will then be published to you in the database and configuration file
