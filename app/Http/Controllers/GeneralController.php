<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(["home", "formatting"]);
    }

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data = [
            "latestRecipes" => Recipe::orderBy("created_at","DESC")->limit(15)->get(),
        ];
        return view('welcome')->with($data);
    }

    /**
     * Display the formatting help page.
     *
     * @return \Illuminate\Http\Response
     */
    public function formatting()
    {
        return view('formatting');
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view("dashboard");
    }

    /**
     * Show the user's recipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function myRecipes()
    {
        $recipeQuery = Recipe::where("poster_id",Auth::id())->orderBy("created_at","DESC");
        $recipes = $recipeQuery->paginate(15);
        $data = [
            "recipes" => $recipes,
            "countMyRecipes" => $recipes->total()
        ];
        return view("recipes.mine")->with($data);
    }
}
