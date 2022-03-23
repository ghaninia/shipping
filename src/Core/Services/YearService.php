<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\Year;

class YearService
{

    public int $currentYear ;

    public function __construct(int $year = null)
    {
        $this->currentYear = $year ?? verta()->year ;
    }

    /**
     * create or new year
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function current() : Year
    {
        return Year::query()->firstOrCreate([
            "year" => $this->currentYear
        ]) ;
    }
}