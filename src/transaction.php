<?php
declare(strict_types=1);
class Transaction{

    public function __construct(private float $amount, private string $transaction){}

    public function addTax(float $rate): Transaction {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    public function getAmount(): float{
        return $this->amount;
    }

    //called when script is end
    public function __destruct(){
        echo 'Destract ' . $this->transaction . '</br>';
    }
}