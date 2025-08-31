<?php

ob_start();


include_once "class.autoload.inc.php";


date_default_timezone_set('Europe/Riga');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
      
        $description = $_POST['description'] ?? '';
        $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0.0;
        $date = $_POST['expense-date'] ?? date('Y-m-d'); 
        $type = $_POST['type'] ?? '';

        
        if (empty($amount) || empty($date) || empty($type)) {
            throw new Exception("Amount, date, and type are required fields.");
        }

        
        $expense = ExpenseFactory::createExpense($description, $amount, $date, $type);

        
        $expenseContr = new ExpenseContr($expense);
        $expenseContr->setExpense();

        
        header('Location: ../index.php');
        exit();

    } catch (Exception $e) {
        
        error_log("Failed to add expense: " . $e->getMessage());
        header('Location: ../index.php?error=' . urlencode($e->getMessage()));
        exit();
    }
} else {
    
    header('Location: ../index.php');
    exit();
}


ob_end_flush();