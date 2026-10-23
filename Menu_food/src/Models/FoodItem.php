<?php
namespace App\Models;
class FoodItem
{
    private string $name;
    private string $type;

    private function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    // Static Factory Method สำหรับสร้าง Object (Best Practice สำหรับ Private Constructor)
    public static function create(string $name, string $type): self
    {
        return new self($name, $type);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
?>