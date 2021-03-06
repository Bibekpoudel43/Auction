<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.categories.add-category');
        }
        else if($request->isMethod('post'))
        {
                $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
            $data = $request->all();

            $category = new Category;

            $slug = str_slug($data['name'], '-');
            $category->name = $data['name'];
            $category->slug = $slug;
            $category->status = $data['status'];
            $category->save();

            Session::flash('category_added', 'Category added Successfully!');
            return redirect('/admin/view-categories');      
        }
    }

    public function viewCategories()
    {
       $categories = Category::get();
       return view('admin.categories.view-categories', compact('categories'));
    }

    public function editCategory(Request $request, $id = null)
    {
        if($request->isMethod('get'))
        {
            $details = Category::where(['id' => $id])->first();
            return view('admin.categories.edit-category', compact('details'));
        }
        else if($request->isMethod('post'))
        {      
            $data = $request->all();
            $slug = str_slug($data['name'], '-');
    
            Category::where(['id' => $id])->update(['name' => $data['name'], 'slug' => $slug, 'status' => $data['status']]);

            Session::flash('category_updated', 'Category updated Successfully!');
            return redirect ('/admin/view-categories');
        }
    }

    public function deleteCategory(Request $request, $id = null)
    {
        if(!empty($id))
        {
            Category::where(['id' => $id])->delete();

            Session::flash('category-deleted', 'Category removed Successfully!');
            return redirect ('/admin/view-categories');
        }
    }
}
