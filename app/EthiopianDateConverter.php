<?php

namespace App;

Class EthiopianDateConverter
{
    protected $gc_year;
    protected $gc_month;
    protected $gc_day;

    protected $et_day;
    protected $et_month;
    protected $et_year;


    /**
     * EthiopianDateConverter constructor.
     * @param $gc_year
     * @param $gc_month
     * @param $gc_day
     */
    public function __construct($gc_year, $gc_month, $gc_day)
    {
        $this->gc_year = $gc_year;
        $this->gc_month = $gc_month;
        $this->gc_day = $gc_day;
    }

    // checking et lear year
    public function isEtLeap($et_year)
    {
        return (($et_year % 4) === 3) ? true : false;
    }

    // check no. days of pagume
    public function getPagume($et_year)
    {
        return ($et_year % 4 === 3) ? 6 : 5;
    }

    public function getEtYear($gc_month)
    {
        if ($gc_month >= 5 && $gc_month <= 12) {
            $this->et_year = $this->gc_year - 8;
        } else if ($gc_month > 0 && $gc_month < 5) {
            $this->et_year = $this->gc_year - 7;
        }

        return $this->et_year ? $this->et_year : '';
    }
}