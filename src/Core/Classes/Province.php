<?php

namespace GhaniniaIR\Shipping\Core\Classes;

use GhaniniaIR\Shipping\Core\Enums\ProvinceStatus;
use GhaniniaIR\Shipping\Core\Exceptions\NotMatchProvinceException;

class Province
{

    private int $sourceStateID, $destionationStateID;

    public const ALL = [
        1  => "تهران",
        2  => "گیلان",
        3  => "آذربایجان شرقی",
        4  => "خوزستان",
        5  => "فارس",
        6  => "اصفهان",
        7  => "خراسان رضوی",
        8  => "قزوین",
        9  => "سمنان",
        10 => "قم",
        11 => "مرکزی",
        12 => "زنجان",
        13 => "مازندران",
        14 => "گلستان",
        15 => "اردبیل",
        16 => "آذربایجان غربی",
        17 => "همدان",
        18 => "کردستان",
        19 => "کرمانشاه",
        20 => "لرستان",
        21 => "بوشهر",
        22 => "کرمان",
        23 => "هرمزگان",
        24 => "چهارمحال و بختیاری",
        25 => "یزد",
        26 => "سیستان و بلوچستان",
        27 => "ایلام",
        28 => "کهگلویه و بویراحمد",
        29 => "خراسان شمالی",
        30 => "خراسان جنوبی",
        31 => "البرز",
    ];

    /**
     * Search provinces from the list of provinces
     * @param int $ID
     * @return string 
     * 
     * @throws NotFoundProvince
     */
    public function find(int $ID)
    {
        return self::ALL[$ID] ?? throw new NotMatchProvinceException();
    }

    /**
     * Neighbors of the provinces
     * @return array 
     * 
     * @throws NotFoundProvince
     */
    public function myNightBours(int $stateID)
    {
        return match ($stateID) {
            1  => [13, 31, 11, 10, 9],
            2  => [15, 12, 8, 13],
            3  => [15, 12, 16],
            4  => [27, 20, 24, 28, 21],
            5  => [21, 28, 6, 25, 22, 23],
            6  => [5, 25, 9, 10, 11, 20, 24, 28],
            7  => [29, 9, 30, 25],
            8  => [2, 12, 17, 11, 31, 13],
            9  => [6, 25, 7, 29, 14, 13, 1, 10],
            10 => [1, 6, 9, 11],
            11 => [6, 10, 1, 31, 8, 17, 20],
            12 => [3, 16, 15, 2, 8, 17, 18],
            13 => [14, 2, 1, 31, 8, 9],
            14 => [29, 9, 13],
            15 => [3, 2, 12],
            16 => [3, 12, 18],
            17 => [18, 19, 12, 8, 11, 20],
            18 => [17, 19, 12, 16],
            19 => [18, 17, 20, 27],
            20 => [11, 17, 19, 27, 6, 24, 4],
            21 => [23, 5, 28, 4],
            22 => [26, 23, 5, 25, 30],
            23 => [26, 22, 5, 21],
            24 => [6, 28, 4, 20],
            25 => [30, 6, 5, 22, 9, 7],
            26 => [23, 22, 30],
            27 => [4, 20, 19],
            28 => [6, 24, 4, 21, 5],
            29 => [14, 9, 7],
            30 => [26, 22, 25, 7],
            31 => [13, 8, 1, 11],
            default => throw new NotMatchProvinceException()
        };
    }

    /**
     * Set the value of the province of origin
     * @param int $weight
     * 
     * @return self
     */
    public function sourceState(int $stateID)
    {
        $this->find($stateID);
        $this->sourceStateID = $stateID;
        return $this;
    }

    /**
     * Set the value of the destination province
     * @param int $weight
     * 
     * @return self
     */
    public function destinationState(int $stateID)
    {
        $this->find($stateID);
        $this->destionationStateID = $stateID;
        return $this;
    }

    /** 
     * The situation of the two provinces together
     * 
     * @return ProvinceStatus
     */
    public function situationStatesTogether()
    {

        if ($this->destionationStateID == $this->sourceStateID)
            return ProvinceStatus::InSide;

        elseif ($this->provincesNeighbors())
            return ProvinceStatus::Neighbor;

        return ProvinceStatus::Far;
    }

    /**
     * Are the two provinces neighbors?
     * 
     * @return boolean 
     */
    public function provincesNeighbors(): bool
    {
        return
            in_array(
                $this->destionationStateID,
                $this->myNightBours($this->sourceStateID)
            );
    }
}
