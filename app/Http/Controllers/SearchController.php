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
        $query = isset($_GET["q"]) ? $_GET["q"] : "" ;
        $recipesQuery = Recipe::where("title", "LIKE", "%".$query."%")
            ->orWhere("time", "LIKE", "%".$query."%")
            ->orWhere("requirements", "LIKE", "%".$query."%")
            ->orWhere("instructions", "LIKE", "%".$query."%")
            ->orWhere("credit", "LIKE", "%".$query."%")
            ->orderBy("created_at", "DESC");
        $recipes = $recipesQuery->paginate(15);
        $data = [
            "recipes" => $recipes,
            "countRecipes" => $recipes->total()
        ];
        return view('recipes.search')->with($data);
    }
}
