<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\State;
use Illuminate\Support\Collection;

class LocationService
{

    private int $sourceStateID, $destionationStateID;
    private int $sourceCityID, $destionationCityID ;

    /**
     * Get a list of provinces and cities
     * @return Collection
     */
    public function list() : Collection
    {
        return State::with("cities")->get() ;
    }


}
