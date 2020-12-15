<h1>نصب</h1>

برای نصب دستور زیر را وارد کنید
<br><code>$ composer require ghaninia/shipping</code>
<br>
حال باید پکیج را درون پروژه خود اضافه کنید برای این کار دستور زیر را وارد کنید
<code>

// config/app.php
'providers' => [
    ...
    GhaniniaIR\Shipping\ShippingServiceProvider::class,
],

'alias' => [
    ...
    'Shipping' =>GhaniniaIR\Shipping\Shipping::class,
]

 ,
</code>

<h1>نحوه استفاده</h1>
در بالای هر فایل خود از کلاس shipping استفاده میکند، از دستور زیر استفاده کنید
<code>
 GhaniniaIR\Shipping\Shipping
</code>
