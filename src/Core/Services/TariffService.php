<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\City;
use GhaniniaIR\Shipping\Models\Driver;
use GhaniniaIR\Shipping\Models\TariffDetail;
use GhaniniaIR\Shipping\Models\Year;

class TariffService
{
    /**
     * @param Driver $driver
     * @param Year $year
     * @param int $weight
     * @param string|null $type
     * @param City $city
     */
    public function __construct(
        protected Driver $driver ,
        protected Year $year ,
        protected int $weight ,
        protected ?string $type = null ,
        protected  City $city
    ){}

    /**
     * A tariff that matches our details
     * @return TariffDetail|null
     */
    public function search() : ?TariffDetail
    {
        $tariff =
            TariffDetail::with("tariff")
                ->whereHas("tariff" , function($query){
                    $query
                        ->where("is_provincial_capital" , $this->city->is_provincial_capital )
                        ->where("driver_id" , $this->driver->id )
                        ->where("year_id" , $this->year->id ) ;
                })
                ->where(function($query){
                    $query
                        ->where(function($query){
                            $query
                                ->where("min_weight" , "<=" , $this->weight)
                                ->where("max_weight" , ">=" , $this->weight) ;
                        })
                        ->orWhere(function($query){
                            $query
                                ->where("min_weight" , "<=" , $this->weight)
                                ->whereNull("max_weight" ) ;
                        });
                })
                ->when($this->type , function($query){
                    $query->where("type" , $this->type ) ;
                })
                ->first() ;

        return $tariff ;
    }
}