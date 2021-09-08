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
درصورتی که از لاراول استفاده میکنید و در غیر اینصورت بیخیال این قضیه بشید !‌
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
or 
use Shipping ;
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
php artisan vendor:publish --tag=config
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
            <td>34</td>
            <td>مرکزی</td>
        </tr>
        <tr>
            <td>35</td>
            <td>مازندران</td>
        </tr>
        <tr>
            <td>36</td>
            <td>آذربایجان شرقی</td>
        </tr>
        <tr>
            <td>37</td>
            <td>آذربایجان غربی</td>
        </tr>
        <tr>
            <td>38</td>
            <td>کرمانشاه</td>
        </tr>
        <tr>
            <td>39</td>
            <td>خوزستان</td>
        </tr>
        <tr>
            <td>40</td>
            <td> فارس</td>
        </tr>
        <tr>
            <td>41</td>
            <td>خراسان رضوی</td>
        </tr>
        <tr>
            <td>42</td>
            <td>اصفحان</td>
        </tr>
        <tr>
            <td>43</td>
            <td>سیستان و بلوچستان</td>
        </tr>
        <tr>
            <td>44</td>
            <td>کردستان</td>
        </tr>
        <tr>
            <td>45</td>
            <td>همدان</td>
        </tr>
        <tr>
            <td>46</td>
            <td>چهارمحال وبختیاری</td>
        </tr>
        <tr>
            <td>47</td>
            <td>لرستان</td>
        </tr>
        <tr>
            <td>48</td>
            <td>ایلام</td>
        </tr>
        <tr>
            <td>49</td>
            <td> کهگیلویه وبویراحمد</td>
        </tr>
        <tr>
            <td>50</td>
            <td>بوشهر</td>
        </tr>
        <tr>
            <td>51</td>
            <td>زنجان</td>
        </tr>
        <tr>
            <td>52</td>
            <td>سمنان</td>
        </tr>
        <tr>
            <td>53</td>
            <td>یزد</td>
        </tr>
        <tr>
            <td>54</td>
            <td>خراسان جنوبی</td>
        </tr>
        <tr>
            <td>55</td>
            <td>تهران</td>
        </tr>
        <tr>
            <td>56</td>
            <td>اردبیل</td>
        </tr>
        <tr>
            <td>57</td>
            <td> قم </td>
        </tr>
        <tr>
            <td>58</td>
            <td>قزوین</td>
        </tr>
        <tr>
            <td>59</td>
            <td> گلستان </td>
        </tr>
        <tr>
            <td>60</td>
            <td>خراسان شمالی</td>
        </tr>
        <tr>
            <td>61</td>
            <td>البرز  </td>
        </tr>
        <tr>
            <td>62</td>
            <td>کرمان </td>
        </tr>
        <tr>
            <td>63</td>
            <td>هرمزگان</td>
        </tr>
        <tr>
            <td>64</td>
            <td>گیلان</td>
        </tr>
    </tbody>
</table>