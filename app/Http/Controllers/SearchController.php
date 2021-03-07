<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function results()
    {
        $query = isset($_GET["q"]) ? $_GET["q"] : "";
        $queryArray = array_map('trim', explode(",", $query));
        $recipesQuery = Recipe::query();
        foreach ($queryArray as $q) {
            $recipesQuery->orWhere("title", "LIKE", "%" . $q . "%")
                ->orWhere("time", "LIKE", "%" . $q . "%")
                ->orWhere("requirements", "LIKE", "%" . $q . "%")
                ->orWhere("instructions", "LIKE", "%" . $q . "%")
                ->orWhere("credit", "LIKE", "%" . $q . "%");
        }
        $recipesQuery->orderBy("created_at", "DESC");
        $recipes = $recipesQuery->paginate(15);
        $data = [
            "recipes" => $recipes,
            "countRecipes" => $recipes->total()
        ];
        return view('recipes.search')->with($data);
    }
}
