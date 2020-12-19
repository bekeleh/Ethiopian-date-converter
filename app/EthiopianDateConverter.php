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
    //gc months [1,2,..12]
    private static $gregorian_months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    // et months [4,5,6,7,8,9,10,11,12,13,1,2,3]
    private static $ethiopian_months = ["Tah", "Tir", "Yek", "Meg", "Miy", "Gin", "Sen", "Ham", "Neh", "Pau", "Mes", "Tik", "Hid"];
    private static $month_days_difference = [9, 8, 7, 9, 8, 8, 7, 7, 9, 5, 10, 10, 9];

    /**
     * EthiopianDateConverter constructor.
     * @param $gc_year
     * @param $gc_month
     * @param $gc_day
     */
    public function __construct($gc_day, $gc_month, $gc_year)
    {
        $this->gc_day = $gc_day;
        $this->gc_month = $gc_month;
        $this->gc_year = $gc_year;

    }

    // checking et lear year
    public function isEtLeapYear()
    {
        $this->et_year = $this->getEtYear();
        return (($this->et_year % 4) == 0) ? true : false;
    }

    public function isGcLeapYear()
    {
        return (($this->gc_year % 4) == 0) ? true : false;
    }

    // check no. days of pagume
    public function getPagume()
    {
        return ($this->getPagume()) ? 6 : 5;
    }

    public function getEtYear()
    {
        if ($this->gc_month >= 1 && $this->gc_month <= 8) {
            $this->et_year = $this->gc_year - 8;
        } else {
            $this->et_year = $this->gc_year - 7;
        }

        return $this->et_year;
    }

    public function getEtDate()
    {
        $this->getEtYear();
        if ($this->gc_month == 1 || $this->gc_month == "Jan") {
            if ($this->isEtLeapYear()) {
                if ($this->gc_day < 10) {
                    $this->et_month = 4;
                    $this->et_day = ($this->gc_day + 31) - 10;
                } else {
                    $this->et_month = 5;
                    $this->et_day = $this->gc_day - 9;
                }
            } else {
                if ($this->gc_day < 9) {
                    $this->et_month = 5;
                    $this->et_day = ($this->gc_day + 31) - 9;
                } else {
                    $this->et_month = 5;
                    $this->et_day = $this->gc_day - 8;
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 2 || $this->gc_month == "Feb") {
            if ($this->isEtLeapYear()) {
                if ($this->gc_day < 10) {
                    $this->et_month = 5;
                    $this->et_day = ($this->gc_day + 31) - 9;
                } else {
                    $this->et_month = 6;
                    $this->et_day = $this->gc_day - 8;
                }
            } else {
                if ($this->gc_day < 8) {
                    $this->et_month = 5;
                    $this->et_day = ($this->gc_day + 31) - 8;
                } else {
                    $this->et_month = 6;
                    $this->et_day = $this->gc_day - 7;
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 3 || $this->gc_month == "Mar") {
            if ($this->gc_day < 10) {
                $this->et_month = 6;
                $this->et_day = ($this->gc_day + 29) - 8;
            } else {
                $this->et_month = 7;
                $this->et_day = $this->gc_day - 9;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 4 || $this->gc_month == "Apr") {
            if ($this->gc_day < 9) {
                $this->et_month = 7;
                $this->et_day = ($this->gc_day + 30) - 8;
            } else {
                $this->et_month = 8;
                $this->et_day = $this->gc_day - 8;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 5 || $this->gc_month == "May") {
            if ($this->gc_day < 9) {
                $this->et_month = 8;
                $this->et_day = ($this->gc_day + 30) - 8;
            } else {
                $this->et_month = 9;
                $this->et_day = $this->gc_day - 8;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 6 || $this->gc_month == "Jun") {
            if ($this->gc_day < 8) {
                $this->et_month = 9;
                $this->et_day = ($this->gc_day + 31) - 8;
            } else {
                $this->et_month = 10;
                $this->et_day = $this->gc_day - 7;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 7 || $this->gc_month == "Jul") {
            if ($this->gc_day < 8) {
                $this->et_month = 10;
                $this->et_day = ($this->gc_day + 30) - 7;
            } else {
                $this->et_month = 11;
                $this->et_day = $this->gc_day - 6;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 8 || $this->gc_month == "Aug") {
            if ($this->gc_day < 7) {
                $this->et_month = 11;
                $this->et_day = ($this->gc_day + 31) - 7;
            } else {
                $this->et_month = 12;
                $this->et_day = $this->gc_day - 6;
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 9 || $this->gc_month == "Sep") {
            if ($this->isEtLeapYear()) {
                if ($this->isGcLeapYear()) {
                    if ($this->gc_day < 6) {
                        $this->et_month = 12;
                        $this->et_day = ($this->gc_day + 31) - 6;
                    } else {
                        if ($this->gc_day < 12) {
                            $this->et_month = 13;
                            $this->et_day = $this->gc_day - 5;
                        } else {
                            $this->et_month = 1;
                            $this->et_day = $this->gc_day - 10;
                        }
                    }
                } else {
                    if ($this->gc_day < 6) {
                        $this->et_month = 12;
                        $this->et_day = $this->gc_day - 7;
                    } else {
                        if ($this->gc_day < 12) {
                            $this->et_month = 13;
                            $this->et_day = $this->gc_day - 6;
                        } else {
                            $this->et_month = 1;
                            $this->et_day = $this->gc_day - 10;
                        }
                    }
                }
            } else {
                if ($this->isGcLeapYear()) {
                    if ($this->gc_day < 5) {
                        $this->et_month = 12;
                        $this->et_day = ($this->gc_day + 31) - 5;
                    } else {
                        if ($this->gc_day < 11) {
                            $this->et_month = 13;
                            $this->et_day = $this->gc_day - 4;
                        } else {
                            $this->et_month = 1;
                            $this->et_day = $this->gc_day - 10;
                        }
                    }
                } else {
                    if ($this->gc_day < 5) {
                        $this->et_month = 12;
                        $this->et_day = ($this->gc_day + 31) - 6;
                    } else {
                        if ($this->gc_day < 11) {
                            $this->et_month = 13;
                            $this->et_day = $this->gc_day - 5;
                        } else {
                            $this->et_month = 1;
                            $this->et_day = $this->gc_day - 10;
                        }
                    }
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 10 || $this->gc_month == "Oct") {
            if ($this->isEtLeapYear()) {
                if ($this->gc_day < 12) {
                    $this->et_month = 1;
                    $this->et_day = ($this->gc_day + 30) - 11;
                } else {
                    $this->et_month = 2;
                    $this->et_day = $this->gc_day - 11;
                }
            } else {
                if ($this->gc_day < 11) {
                    $this->et_month = 1;
                    $this->et_day = ($this->gc_day + 30) - 10;
                } else {
                    $this->et_month = 2;
                    $this->et_day = $this->gc_day - 10;
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 11 || $this->gc_month == "Nov") {
            if ($this->isEtLeapYear()) {
                if ($this->gc_day < 11) {
                    $this->et_month = 2;
                    $this->et_day = ($this->gc_day + 31) - 11;
                } else {
                    $this->et_month = 3;
                    $this->et_day = $this->gc_day - 10;
                }
            } else {
                if ($this->gc_day < 10) {
                    $this->et_month = 2;
                    $this->et_day = ($this->gc_day + 31) - 10;
                } else {
                    $this->et_month = 3;
                    $this->et_day = $this->gc_day - 9;
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        } elseif ($this->gc_month == 12 || $this->gc_month == "Dec") {
            if ($this->isEtLeapYear()) {
                if ($this->gc_day < 11) {
                    $this->et_month = 3;
                    $this->et_day = ($this->gc_day + 30) - 10;
                } else {
                    $this->et_month = 4;
                    $this->et_day = $this->gc_day - 10;
                }
            } else {
                if ($this->gc_day < 10) {
                    $this->et_month = 3;
                    $this->et_day = ($this->gc_day + 30) - 9;
                } else {
                    $this->et_month = 4;
                    $this->et_day = $this->gc_day - 9;
                }
            }
            return $this->et_day . '/' . $this->et_month . '/' . $this->et_year;
        }

    }

}