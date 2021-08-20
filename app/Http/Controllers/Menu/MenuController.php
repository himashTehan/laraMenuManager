<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Rules\CategoryRule;
use Illuminate\Http\Request;
use Faker\Factory;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('manage.menu.index')->with(['menuList' => Menu::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.menu.create')->with(['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'category' => new CategoryRule(),
            'image' => 'required|mimes:jpg,png|max:2048'
        ]);


        $faker = Factory::Create();
        $category = Category::select('id')->where('id', $request->category)->first();

        $newImageName = time() .'_'.$request->image->getClientOriginalName();
        //move image
        $request->image->move(public_path('img'),$newImageName);

        $category->menu()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $newImageName,
            'active' => true,
        ]);

        return redirect()->route('menu.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('manage.menu.edit')->with([
            'menu' => $menu,
            'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => new CategoryRule()
        ]);

        $selected_category = Category::find($request->category);

        $menu->name = $request->name;
        $menu->price = $request->price;
        if ($selected_category !== null) {
            $menu->category()->associate($selected_category);
        }
        $menu->save();
        return redirect()->route('menu.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->category()->dissociate();
        $menu->delete();
        return redirect()->route('menu.menus.index');
    }
}
