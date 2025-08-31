<?php
class Unknown extends Expense {
    private $attributes;

    public function __construct($description, $amount, $date, $type, array $attributes = []) {
        parent::__construct($description, $amount, $date, $type);
        $this->attributes = $attributes;
    }

    public function getAttributes(): array {
        return $this->attributes;
    }

    public function setAttributes(array $attributes) {
        $this->attributes = $attributes;
    }

    public function displayAttributes(): string {
        return "Unknown expense type";
    }

    public static function createFromPostData(array $postData): Expense {
        // Extract data from the provided array
        $description = $postData['description'] ?? '';
        $amount = (float)($postData['amount'] ?? 0.0);
        $date = $postData['date'] ?? '';
        $type = $postData['type'] ?? 'unknown';

        return new self($description, $amount, $date, $type);
    }
}