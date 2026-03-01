<?php
namespace App\Models;
use App\Models\User;

class Expense{
    private string $title;
    private float $amount;
    private User $payer;

    public function __construct($title,$amount,$payer){
        $this->title = $title;
        $this->amount = $amount;
        $this->payer=$payer;
    }

    public function getSummary(User $user)
    {
        return "title:$this->title,Amount:$this->amount Payer:" .$this->payer;
    }
}