<?php

namespace App\Classes;

class Invoice{
    public function index(): string{
        return 'Invoice';
    }

    public function create(){
        return '<form action="/invoices/create" method="post"><label>Amount<input type="text" name="amount"></label></form>';
    }

    public function store(){
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}