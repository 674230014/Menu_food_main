<?php
namespace App\Models;
class Recipe
{
    private array $ingredients;

    public function __construct(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function displayIngredients(): void
    {
        echo "<b>รายการวัตถุดิบ:</b><br>";
        foreach ($this->ingredients as $item => $amount) {
            echo " - {$item}: {$amount}<br>";
        }
    }
}
?>