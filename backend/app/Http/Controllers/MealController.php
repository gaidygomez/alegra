<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use App\Models\{History, Meal, Storage};
use Illuminate\Http\Request;

class MealController extends Controller
{
    use Helpers;

    public function food()
    {
        $ingredients = [];

        $meal = Meal::all()->random();

        $recipe = $meal->recipe;

        $keys = array_keys($recipe);

        $storage = Storage::whereIn('name', $keys)->get();

        $notExists = $storage->each(
            function ($item, $key) use ($recipe, &$ingredients) {
                $value = ! array_key_exists($item->name, $recipe) ?: $recipe[$item->name];

                if ($item->quantity > 0) {

                    $item->decrement('quantity', $value);

                } else {

                    $ingredients[] = $item->name;

                }
            }
        )->some(
            function ($item, $key) {
                return $item->quantity === 0;
            }
        );

        if ($notExists) {
            $fill = $this->fillStorage(collect($ingredients));

            if ($fill) {

                $this->history($meal->name, 1);
                              
                return response(['plato' => $meal]);
            }

            $this->history($meal->name);

            return response(['error' => 'Plato no Disponible'], 400);
        }
        
        $this->history($meal->name, 1);
        
        return response(['plato' => $meal]);
    }

    public function meals()
    {
        return Meal::all();
    }

    public function inKitchen()
    {
        return History::where('status', 0)->get();
    }
}
