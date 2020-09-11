<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealsResource;
use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::paginate(env('MEALS_PER_PAGE'));
        return new MealsResource($meals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'photo' => 'required',
           'price' => 'required',
           'category_id' => 'required',
           'ingrediants' => 'required'
        ]);

        $meal = new Meal();

        $meal->name = $request->get('name');
        $meal->photo = $request->get('photo');
        $meal->price = $request->get('price');
        $meal->category_id = $request->get('category_id');
        $meal->ingrediants = $request->get('ingrediants');

        $meal->save();

        return new MealResource($meal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::find($id);
        return new MealResource($meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $meal = Meal::find($id);

        if ($request->has('name')){
            $meal->name = $request->get('name');
        }

        if ($request->has('photo')){
            $meal->photo = $request->get('photo');
        }

        if ($request->has('price')){
            $meal->price = $request->get('price');
        }

        if ($request->has('category_id')){
            $meal->category_id = $request->get('category_id');
        }

        if ($request->has('ingrediants')){
            $meal->ingrediants = $request->get('ingrediants');
        }

        $meal->save();

        return new MealResource($meal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::find($id);
        $meal->delete();

        return new MealResource($meal);
    }
}
