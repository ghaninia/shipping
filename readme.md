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

<p>and If you want run package on laravel, you must add below command to app.php <p>

```php 
### config/app.php
<?php
    ....
    'providers' => [
        ...
        GhaniniaIR\Shipping\ShippingServiceProvider::class, ### ✔
    ],
```

<hr />

<h3>Publishing Core</h3>
<p>You can edit the database to change the postal tariffs.</p>

```composer log
php artisan vendor:publish --tag=shipping --force
```

<hr />
<h3>Geo basic information</h3>
<p>Receive information of cities and provinces and their details</p>

```php
<?php 

use GhaniniaIR\Shipping\Core\Services\LocationService ;

### Get information on cities and provinces
(new LocationService())->list();

### Get the list of neighboring provinces
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

<hr />

<h3>Calculate Tariffs</h3>

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
