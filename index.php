<?php

include_once "includes/class.autoload.inc.php";


$expenseView = new ExpenseView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>
    <header>
        <div class="svg-h1">
            <img src="includes/wallet-svgrepo-com.svg" alt="Wallet icon" class="svg">
            <h1>Expense Tracker</h1>
        </div>
        <h2>Track your Spending with ease</h2>
    </header>
    <main>
        <div class="container">
            <div class="row main">
                <div class="col-sm">
                    <span class="def">Total Expenses</span>
                    <span>$<?php $expenseView->showTotalExpenses(); ?></span>
                    <span class="description">Last 30 Days</span>
                </div>
                <div class="col-sm">
                    <span class="def">Daily Average</span>
                    <span>$<?php $expenseView->showDailyAverage(); ?></span>
                    <span class="description">Last 30 Days</span>
                </div>
                <div class="col-sm">
                    <span class="def">Categories</span>
                    <span id="number">7</span>
                    <span class="description">Different types</span>
                </div>
            </div>
        </div>
        <div class="container form-chart mt-4">
            <div class="row">
                <div class="col-12 col-md-5">
                    <form action="includes/addExpenses.inc.php" id="expenses-form" method="post" class="p-4 rounded-3">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <input type="text" id="description" class="form-control" placeholder="e.g., Coffee, groceries" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount ($):</label>
                            <input type="number" id="amount" class="form-control" placeholder="Amount" name="amount" required min="0" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="expense-date" class="form-label">Date:</label>
                            <input type="date" id="expense-date" name="expense-date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="expensesType" class="form-label">Category:</label>
                            <select class="form-select" id="expensesType" name="type" required>
                                <option value="" selected disabled>Select a category</option>
                                <option value="food">Food</option>
                                <option value="transport">Transport</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="utilities">Utilities</option>
                                <option value="shopping">Shopping</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary homebutton w-100" form="expenses-form" >Submit</button>
                    </form>
                </div>
                <div class="col-12 col-md-7">
                    <div class="chart-container">
                        <?php $expenseView->showExpensesPieChart(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="javaScript/expenses.js"></script>
</body>
</html>
