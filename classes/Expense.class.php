<?php
abstract class Expense extends Dbh {
    protected $description;
    protected $amount;
    protected $date;
    protected $type;

    public function __construct($description, $amount, $date, $type) {
        $this->setDescription($description);
        $this->setAmount($amount);
        $this->setDate($date);
        $this->type = $type;
    }

    protected function setDescription($description) {
        $this->description = $description;
    }

    protected function setAmount($amount) {
        $this->amount = (float)$amount;
    }

    protected function setDate($date) {
        $this->date = $date;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getDate() {
        return $this->date;
    }

    public function getType() {
        return $this->type;
    }

    public function saveToDatabase() {
        $dbh = new Dbh();
        $conn = $dbh->connect();
        
        $sql = "INSERT INTO expenses (description, amount, date, type) VALUES (?, ?, ?, ?)";
        
        try {
            $stmt = $conn->prepare($sql);
            $params = [$this->getDescription(), $this->getAmount(), $this->getDate(), $this->getType()];
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            throw new Exception("Failed to save Expense");
        }
    }

    public static function getAll() {
        $dbh = new Dbh();
        $sql = "SELECT * FROM expenses";
        $stmt = $dbh->connect()->prepare($sql);
        $stmt->execute();

        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $type = $row['type'] ?? 'unknown';
            try {
                $results[] = ExpenseFactory::createExpense(
                    $row['description'],
                    (float)$row['amount'],
                    $row['date'],
                    $type
                );
            } catch (InvalidArgumentException $e) {
                error_log("Error creating expense: " . $e->getMessage());
                continue;
            }
        }
        return $results;
    }
}
