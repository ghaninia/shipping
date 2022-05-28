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
     * @param string|null $type
     * @param City $city
     */
    public function __construct(
        protected Driver $driver,
        protected int $weight,
        protected ?string $type = null,
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
            ->where("is_provincial_capital", $this->city->is_provincial_capital)
            ->whereHas("tariff", function ($query) {
                $query->where("driver_id", $this->driver->id);
            })
            ->where(function ($query) {
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
            ->when($this->type, function ($query) {
                $query->where("type", $this->type);
            })
            ->first();

        return $tariff;
    }
}
