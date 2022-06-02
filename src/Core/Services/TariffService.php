<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\City;
use GhaniniaIR\Shipping\Models\Driver;
use GhaniniaIR\Shipping\Models\TariffDetail;

class TariffService
{

    /**
     * @param Driver $driver
     * @param int $weight
     * @param string $type
     * @param City $city
     */
    public function __construct(
        protected Driver $driver,
        protected int $weight,
        protected string $type,
        protected City $city
    ) {
    }

    /**
     * A tariff that matches our details
     * @return TariffDetail|null
     */
    public function search(): ?TariffDetail
    {
        $tariff =
            TariffDetail::with("tariff")
            ->whereHas("tariff", function ($query) {
                $query->where("driver_id", $this->driver->id);
            })
            ->where(function ($query) {
                ### weight search
                $query
                    ->where(function ($query) {
                        $query
                            ->where("min_weight", "<=", $this->weight)
                            ->where("max_weight", ">=", $this->weight);
                    })
                    ->orWhere(function ($query) {
                        $query
                            ->where("min_weight", "<=", $this->weight)
                            ->whereNull("max_weight");
                    });
            })
            ->where("is_provincial_center", $this->city->is_provincial_capital)
            ->when($this->type, function ($query) {
                ### type search
                $query->where("type", $this->type);
            })
            ->first();

        return $tariff;
    }
}
