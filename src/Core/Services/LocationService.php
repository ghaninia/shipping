<?php

namespace GhaniniaIR\Shipping\Core\Services;

use Illuminate\Support\Collection;
use GhaniniaIR\Shipping\Models\City;
use GhaniniaIR\Shipping\Models\State;
use GhaniniaIR\Shipping\Core\Enums\EnumState;

class LocationService
{

    protected ?City $sourceCity, $destinationCity;
    protected State $sourceState, $destinationState;

    /**
     * Get a list of provinces and cities
     * @return Collection
     */
    public function list($withNighBours = false): Collection
    {
        return State::query()
            ->with("cities")
            ->when($withNighBours, fn ($query) => $query->with("nighbours"))
            ->get();
    }


    /**
     * Set the origin
     * @param State $state
     * @param City|null $city
     * @return $this
     */
    public function source(State $state, ?City $city = null)
    {
        $this->sourceState = $state;
        $this->sourceCity = $city;

        return $this;
    }

    /**
     * Set the destination
     * @param State $state
     * @param City|null $city
     * @return $this
     */
    public function destination(State $state, ?City $city = null)
    {
        $this->destinationState = $state;
        $this->destinationCity = $city;

        return $this;
    }

    /**
     * The situation of the two provinces together
     *
     * @return string
     */
    public function situationStatesTogether()
    {
        if ($this->fellowCitizenTogether())
            return EnumState::InCity;

        elseif ($this->destinationState->id == $this->sourceState->id)
            return EnumState::InSide;

        elseif ($this->provincesNeighbors())
            return EnumState::Neighbor;

        return EnumState::Far;
    }

    /**
     * Are the two provinces neighbors?
     *
     * @return boolean
     */
    public function provincesNeighbors(): bool
    {
        return
            $this->sourceState
            ->nighbours()
            ->where("states.id",  $this->destinationState->id)
            ->exists();
    }

    /**
     * They are citizens of each other
     * 
     * @return bool 
     */
    public function fellowCitizenTogether(): bool
    {
        return
            !!$this->destinationCity &&
            !!$this->sourceCity &&
            $this->destinationCity->id === $this->sourceCity->id;
    }
}
