<?php
namespace App\Services;

use App\Models\Recipe;

class FoodRecipe
{
    private string $name;
    private Recipe $recipe;

    public function __construct(string $name, Recipe $recipe)
    {
        $this->name = $name;
        $this->recipe = $recipe; 
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRecipe(): Recipe
    {
        return $this->recipe;
    }

    public function displayFoodInfo(): void
    {
        echo "====================================<br>";
        echo "<b>เมนู: " . $this->name . "</b><br>";
        echo "------------------------------------<br>";
        $this->recipe->displayIngredients();
        echo "====================================<br><br>";
    }
}
?>