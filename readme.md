<div align="center">
<img src="https://ghaninia.ir/filemanager/uploads/photos/1/iranpost.png" height="200"  />
</div>
<h1 dir="rtl">نصب</h1>
<p  dir="rtl">
برای نصب دستور زیر را وارد کنید
</p>

```php
$ composer require ghaninia/shipping
```

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
در بالای هر فایل خود از کلاس shipping   مانند دستور زیر استفاده کنید
</p>

```php
use GhaniniaIR\Shipping\Shipping ;
```

<p dir="rtl">
برای محاسبه قیمت پست سفارشی و پیشتاز طبق الگو زیر عمل باید نمایید:
</p>

<ul dir="rtl">
    <li><b>arg 1</b> : آیدی استان مبدا</li>
    <li><b>arg 2</b> : آیدی استان مقصد</li>
    <li><b>arg 3</b>: وزن مرسوله برحسب گرم</li>
    <li><b>arg 4</b> : قیمت مرسوله میتواند null باشد. برحسب ریال</li>
</ul>

```php
Shipping::sefarshi( $sourceID , $destinationID , $weight , $price )->getPrice()

Shipping::pishtaz( $sourceID , $destinationID , $weight , $price )->getPrice()
```

<h1 dir="rtl">COD</h1>
<p dir="rtl">
    در صورتی که مرسوله شما پرداخت در محل باشد میتوانید از تابع زیر استفاده کنید تنها کافیه از دستور زیر تبعیت نمایید.
</p>

```php
Shipping::sefarshi( $sourceID , $destinationID , $weight , $price )->getPrice( true )

Shipping::pishtaz( $sourceID , $destinationID , $weight , $price )->getPrice( true )
```

<h1 dir="rtl">بروزرسانی تعرفه ها</h1>
<p dir="rtl">
    در صورتی که لیست قیمت شرکت پست بروز گردیده باشد شما میتوانید فایل  تنظیمات پکیج را publish نمایید تا قیمت ها را بروز رسانی کنید برای این کار کافیه کد در ترمینال وارد کنید:
</p>

```php
php artisan vendor:publish
```

<p dir="rtl">
در پوشه config شما فایلی به اسم shipping.php  دارید بعد از باز کردن فایل میتوانید تعرفه ها را بروز نمایید.
</p>

<table dir="rtl" align="right">
    <thead >
        <tr>
            <th colspan="2">استان های تحت پوشش بهمراه آیدی</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>تهران</td>
        </tr>
        <tr>
            <td>2</td>
            <td>گیلان</td>
        </tr>
        <tr>
            <td>3</td>
            <td>آذربایجان شرقی</td>
        </tr>
        <tr>
            <td>4</td>
            <td>خوزستان</td>
        </tr>
        <tr>
            <td>5</td>
            <td>فارس</td>
        </tr>
        <tr>
            <td>6</td>
            <td>اصفهان</td>
        </tr>
        <tr>
            <td>7</td>
            <td>خراسان رضوی</td>
        </tr>
        <tr>
            <td>8</td>
            <td>قزوین</td>
        </tr>
        <tr>
            <td>9</td>
            <td>سمنان</td>
        </tr>
        <tr>
            <td>10</td>
            <td>قم</td>
        </tr>
        <tr>
            <td>11</td>
            <td>مرکزی</td>
        </tr>
        <tr>
            <td>12</td>
            <td>زنجان</td>
        </tr>
        <tr>
            <td>13</td>
            <td>مازندران</td>
        </tr>
        <tr>
            <td>14</td>
            <td>گلستان</td>
        </tr>
        <tr>
            <td>15</td>
            <td>اردبیل</td>
        </tr>
        <tr>
            <td>16</td>
            <td>آذربایجان غربی</td>
        </tr>
        <tr>
            <td>17</td>
            <td>همدان</td>
        </tr>
        <tr>
            <td>18</td>
            <td>کردستان</td>
        </tr>
        <tr>
            <td>19</td>
            <td>کرمانشاه</td>
        </tr>
        <tr>
            <td>20</td>
            <td>لرستان</td>
        </tr>
        <tr>
            <td>21</td>
            <td>بوشهر</td>
        </tr>
        <tr>
            <td>22</td>
            <td>کرمان</td>
        </tr>
        <tr>
            <td>23</td>
            <td>هرمزگان</td>
        </tr>
        <tr>
            <td>24</td>
            <td>چهارمحال و بختیاری</td>
        </tr>
        <tr>
            <td>25</td>
            <td>یزد</td>
        </tr>
        <tr>
            <td>26</td>
            <td>سیستان و بلوچستان</td>
        </tr>
        <tr>
            <td>27</td>
            <td>ایلام</td>
        </tr>
        <tr>
            <td>28</td>
            <td>کهگلویه و بویراحمد</td>
        </tr>
        <tr>
            <td>29</td>
            <td>خراسان شمالی</td>
        </tr>
        <tr>
            <td>30</td>
            <td>خراسان جنوبی</td>
        </tr>
        <tr>
            <td>31</td>
            <td>البرز</td>
        </tr>
    </tbody>
</table>