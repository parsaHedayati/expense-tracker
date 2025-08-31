<?php
class ExpenseFactory {
    public static function createExpense(string $description, float $amount, string $date, string $type): Expense {
        $className = ucfirst(strtolower($type));

        if (class_exists($className) && is_subclass_of($className, Expense::class)) {
            
            return new $className($description, $amount, $date, $type);
        }

        
        return new Unknown($description, $amount, $date, $type);
    }
}