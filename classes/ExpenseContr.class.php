<?php
class ExpenseContr {
    private Expense $expense;

    public function __construct(Expense $expense) {
        $this->expense = $expense;
    }

    public function setExpense(): void {
        try {
          
            $this->expense->saveToDatabase();
        } catch (Exception $e) {
            
            throw new Exception("Error saving expense: " . $e->getMessage());
        }
    }
}