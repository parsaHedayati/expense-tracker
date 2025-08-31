<?php

class Shopping extends Expense {
    public function __construct(string $desctiption,float $amount,string $date,string $type){
        parent::__construct($desctiption,$amount,$date,$type);
    }

    public static function createFromPostData(array $postData) :Expense{
        return new self(
            $postData['description'],
            (float)$postData['amount'],
            $postData['date'],
            $postData['type'] ?? 'shopping'
        );
    }

}