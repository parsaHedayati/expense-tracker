<?php
class ExpenseView {
    private array $expenses;

    public function __construct() {
        $this->expenses = Expense::getAll();
    }

    public function showTotalExpenses(): void {
        $totalAmount = 0;
        foreach ($this->expenses as $expense) {
            $totalAmount += $expense->getAmount();
        }
        echo number_format($totalAmount, 2);
    }
    
    public function showDailyAverage(): void {
        if (empty($this->expenses)) {
            echo number_format(0, 2);
            return;
        }

        $earliestDate = strtotime($this->expenses[0]->getDate());
        $latestDate = strtotime($this->expenses[0]->getDate());

        foreach ($this->expenses as $expense) {
            $currentDate = strtotime($expense->getDate());
            if ($currentDate < $earliestDate) {
                $earliestDate = $currentDate;
            }
            if ($currentDate > $latestDate) {
                $latestDate = $currentDate;
            }
        }

        $days = ($latestDate - $earliestDate) / (60 * 60 * 24);
        
        if ($days == 0) {
            $days = 1;
        }

        $totalAmount = 0;
        foreach ($this->expenses as $expense) {
            $totalAmount += $expense->getAmount();
        }

        echo number_format($totalAmount / $days, 2);
    }
    
    public function showExpensesPieChart(): void {
        $categoryTotals = $this->prepareChartData($this->expenses);
        
        echo "<script>
            window.expenseData = " . json_encode($categoryTotals) . ";
        </script>";
        
        echo "<canvas id='expenseChart'></canvas>";
    }

    private function prepareChartData(array $expenses): array {
        $categoryTotals = [];
        foreach ($expenses as $expense) {
            
            $type = ucfirst($expense->getType());
            $amount = $expense->getAmount();
            
            if (!isset($categoryTotals[$type])) {
                $categoryTotals[$type] = 0;
            }
            $categoryTotals[$type] += $amount;
        }
        return $categoryTotals;
    }
}
