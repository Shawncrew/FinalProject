<?php

namespace Project4\Models;

class CreditCard {
    public  $Id;
    private $_CardNumber; 
    private $_ExpirationDate;
    private $_SecurityCode; 
    private $_NameOnCard;
    private $_BillingStreetAddress;
    private $_BillingStreetAddress2;
    private $_BillingCity;
    private $_BillingState;
    private $_BillingZip;


    public function getCardNumber() {
        return $this->_CardNumber;
    }
    public function setCardNumber($value) {
        $this->_CardNumber=$value;
    }


    public function getExpirationDate() {
        return $this->_ExpirationDate;
    }
    public function setExpirationDate($value) {
        $this->_ExpirationDate=$value;
    }


    public function getSecurityCode() {
        return $this->_SecurityCode;
    }
    public function setSecurityCode($value) {
        $this->_SecurityCode=$value;
    }


    public function getNameOnCard() {
        return $this->_NameOnCard;
    }
    public function setNameOnCard($value) {
        $this->_NameOnCard=$value;
    }

    public function getCardCompany() {
        $num = $this->_CardNumber;

        //VISA
        if(\substr($num, 0, 1)=='4') {
            return "Visa";
        } else if(true) {
            return "Not Visa";
        }
    }

    public function setBillingInfo($addr1, $addr2, $city, $state, $zip) {
        $this->_BillingStreetAddress = $addr1;
        $this->_BillingStreetAddress2 = $addr2;
        $this->_BillingCity = $city;
        $this->_BillingState = $state;
        $this->_BillingZip = $zip;
    }
}