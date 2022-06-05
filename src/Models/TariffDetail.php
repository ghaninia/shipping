<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;

class TariffDetail extends Model
{
    
    protected $connection = EnumShipping::CONNECTION_NAME;

    protected $fillable = [
        "tariff_id",
        "min_weight",
        "max_weight",
        "cost",
        "type", // in : EnumState
        "is_provincial_capital"
    ];

    public $timestamps = false;

    public $casts = [
        "is_provincial_capital" => "boolean"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
