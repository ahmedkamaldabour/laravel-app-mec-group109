<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function abort;
use function redirect;
use function route;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->paginate();
        return view('dashboard.pages.categories.index', compact('categories'));
    }

    public function show($category_id)
    {
        $category = DB::table('categories')->where('id',$category_id)->first();
        if(!$category){
            abort(Response::HTTP_NOT_FOUND);
        }
        dd($category);
    }

    public function create()
    {
        return view('dashboard.pages.categories.create');
    }

    public function store(Request $request )
    {
        // get the data form request
        // validate the data ---
        // store data in database
        // redirect to index page
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
//        $category = new Category();
//        $category->name = $data['name'];
//        $category->description = $data['description'];
//        $category->save();
        Category::query()->create($data);
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
//        // get the category by id
//        // check the category is exist or not
//        // if exist then show the edit form
//        $category = DB::table('categories')->where('id', $category_id)->first();
//        if(!$category){
//            abort(Response::HTTP_NOT_FOUND);
//        }
        return view('dashboard.pages.categories.edit', compact('category'));
    }

    public function update (Request $request, $category_id)
    {
        // get the category by id
        // check the category is exist or not
        // if exist then (validate the data) then (update the data) then (redirect to index page)
        $category = Category::findOrfail($category_id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        $category->update($request->all());
        return redirect(route('categories.index'));
    }

    public function destroy($category_id)
    {
        Category::findOrfail($category_id)->delete();
        return redirect(route('categories.index'));
    }


}
