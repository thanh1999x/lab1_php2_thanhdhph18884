<?php
class MonThiDau
{
    public $tenMon;
    public $dkheight;
    public $dkweight;
    public function __construct($tenMon, $dkheight, $dkweight)
    {
        $this->tenMon = $tenMon;
        $this->dkheight = $dkheight;
        $this->dkweight  = $dkweight;
    }
}