<?php

namespace App\Http\Middleware;

use App\Models\Recipe;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsMyRecipe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $recipe = Recipe::find($request->route()->parameter("recipe"))->first();
        if ($recipe->poster_id != Auth::id())
            return redirect()->route('recipes.show', $recipe->id);
        return $next($request);
    }
}
