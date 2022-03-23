<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $fillable = [
        "driver_id" ,
        "year_id" ,
        "cod" , ### هزینه تحویل در محل
        "vat" , ### ارزش افزوده
        "tax" , ### ماالیات
        "registration_fee" , ### هزینه ثبت
        "right_headquarters" , ### خق مقر
        "insurance" , ### بیمه
        "intra_city_commission" , ### کمیسیون درون شهری
        "suburban_commission" , ### کمیسیون برون شهر
        "min_weight" , ### حداقل وزن
        "max_weight" , ### حداکثر وزن
        "is_provincial_capital" ### ایا مرکز استان است یا خیر
    ] ;

    public $timestamps = false ;

    protected $casts = [
        "is_provincial_capital" => "boolean"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver() {
        return $this->belongsTo(Driver::class ) ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function year() {
        return $this->belongsTo( Year::class ) ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details() {
        return $this->hasMany(
            TariffDetail::class
        );
    }

}
