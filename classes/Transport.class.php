<?php
class Transport extends Expense {
    
    public function __construct(string $description, float $amount, string $date, string $type) {
       
        parent::__construct($description, $amount, $date, $type);
    }
    
    
    public static function createFromPostData(array $postData): Expense {
        
        return new self(
            $postData['description'],
            (float)$postData['amount'],
            $postData['date'],
            $postData['type'] ?? 'transport' 
        );
    }
}