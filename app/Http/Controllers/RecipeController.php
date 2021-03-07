<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(["show", "index"]);
        $this->middleware('is.my.recipe')->only(["edit", "update", "destroy", "confirmDestroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("recipes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRecipe $request)
    {
        $recipe = new Recipe();
        $recipe->fill($request->all());
        $recipe->poster_id = Auth::id();
        $recipe->save();
        return redirect()->route("recipes.show", $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Recipe $recipe)
    {
        $data = [
            "recipe" => $recipe
        ];
        return view("recipes.show")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Recipe $recipe)
    {
        $data = [
            "recipe" => $recipe
        ];
        return view("recipes.edit")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRecipe $request, Recipe $recipe)
    {
        $recipe->fill($request->all());
        $recipe->save();
        return redirect()->route("recipes.show", $recipe->id);
    }

    /**
     * Make the user confirm the deletion.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function confirmDestroy(Recipe $recipe)
    {
        $data = [
            "recipe" => $recipe
        ];
        return view("recipes.confirmdestroy")->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route("recipes.mine");
    }
}
