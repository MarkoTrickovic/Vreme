<?php

class Ucenik
{
    public $_ime;
    public $_prezime;
    public $_godine;
    public $_razred;
    public $_braca;
    public $_spavanje;
    public $_budjenje;
    public $_domaci;
    public $_tv;
    public $_igra;
    public $_porodica;
    public $_prijatelji;

    public function __construct($Ime, $Prezime, $Godine, $Razred, $Braca, $Spavanje, $Budjenje, $Domaci, $TV, $Igra, $Porodica,
        $Prijatelji) {
        $this->_ime = $Ime;
        $this->_prezime = $Prezime;
        $this->_godine = $Godine;
        $this->_razred = $Razred;
        $this->_braca = $Braca;
        $this->_spavanje = $Spavanje;
        $this->_budjenje = $Budjenje;
        $this->_domaci = $Domaci;
        $this->_tv = $TV;
        $this->_igra = $Igra;
        $this->_porodica = $Porodica;
        $this->_prijatelji = $Prijatelji;
    }

    public function dobaviIme() {
        return "$this->ime " . "$this->prezime" . "<br>";
    }
}