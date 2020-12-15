<h1 dir="rtl">نصب</h1>
<p  dir="rtl">
برای نصب دستور زیر را وارد کنید
</p>
<code dir="ltr">
$ composer require ghaninia/shipping
</code>

<p  dir="rtl">
حال باید پکیج را درون پروژه خود اضافه کنید برای این کار دستور زیر را وارد کنید
</p>

```php
...config/app.php
    'providers' => [
        ...
        GhaniniaIR\Shipping\ShippingServiceProvider::class,
    ],

    'alias' => [
        ...
        'Shipping' =>GhaniniaIR\Shipping\Shipping::class,
    ],
```


<h1  dir="rtl">نحوه استفاده</h1>
<p  dir="rtl">
در بالای هر فایل خود از کلاس shipping استفاده میکند، از دستور زیر استفاده کنید
</p>

```php
use GhaniniaIR\Shipping\Shipping ;
```

<p dir="rtl">
برای محاسبه قیمت پست سفارشی طبق الگو زیر عمل باید نمایید:
</p>

<ul dir="rtl">
    <li>arg 1 : آیدی استان مبدا</li>
    <li>arg 2 : آیدی استان مقصد</li>
    <li>arg 3 : وزن مرسوله</li>
    <li>arg 4 : قیمت مرسوله میتواند null باشد.</li>
</ul>

```php
Shipping::sefarshi( $sourceID , $destination , $weight , $price )->getPrice()

Shipping::pishtaz( $sourceID , $destination , $weight , $price )->getPrice()
```

<p dir="rtl">
    در صورتی که دریافتی شما تحویل در محل باشد میتوانید از تابع زیر استفاده کنید تنها کافیه از دستور زیر تبعیت نمایید.
</p>

```php
Shipping::sefarshi( $sourceID , $destination , $weight , $price )->getPrice( true )

Shipping::pishtaz( $sourceID , $destination , $weight , $price )->getPrice( true )
```

<p dir="rtl">
    در صورتی که لیست شرکت بروز گردیده باشد شما باید حتما فایل  config را publish نمایید تا قیمت ها را بروز رسانی کنید برای این کار کافیه کد در ترمینال وارد کنید:
</p>

```php
php artisan vendor:publish
```

<p dir="rtl">
در پوشه config شما فایلی به اسم shipping.php  دارید بعد از باز کردن فایل میتوانید تعرفه ها را بروز نمایید.
</p>