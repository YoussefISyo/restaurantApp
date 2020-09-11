<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['meals'] = Meal::paginate(15);
        return view('admin/meals/index', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['categories'] = Category::all();
        return view('admin/meals/create', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meal $meal)
    {
        $request->validate([

        ]);

        if ($request->photo->getClientOriginalName() != null){
            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->photo->storeAs('public/meals',$file);
            $path = asset('storage/meals/'.$file);
        }
        else{
            $path = '';
        }
        $meal->photo = $path;
        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->category_id = $request->category_id;
        $meal->ingrediants = $request->ingrediants;

        $meal->save();
        return redirect()->route('meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $arr['meal'] = $meal;
        $arr['categories'] = Category::all();
        return view('admin/meals/edit', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Meal $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {

        if (isset($request->photo) && $request->photo->getClientOriginalName()){
            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->photo->storeAs('public/meals',$file);
            $path = asset('storage/meals/'.$file);
        }
        else{
            if ($meal->photo == null){
                $path = '';
            }
            else{
                $path = $meal->photo;
            }

        }
        $meal->photo = $path;
        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->category_id = $request->category_id;
        $meal->ingrediants = $request->ingrediants;

        $meal->save();
        return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index');
    }
}
