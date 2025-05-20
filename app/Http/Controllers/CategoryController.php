<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::all();
       // dd($categories);
        return view('backend.category.index', compact('categories'));
    }
    public function create(){
        return view('backend.category.create');
    }
    public function store(Request $request){
        $valicate = validator($request->all(),[
            'categoryName' => 'required|min:3',
        ]);
        if($valicate->fails()){
            return back()->withErrors($valicate); 
        }
        $categories = new Categories();
        $categories->name = $request->categoryName;
        if($categories->save()){
            return redirect()->back()->with('success','Add Success');
        }else{
            return view('error.500');
        }
    }
    public function edit($id){
        $categories = Categories::find($id);
        return view('backend.category.edit', compact ('categories'));
    }
    public function update(Request $request, $id){
         $valicate = validator($request->all(),[
            'categoryName' => 'required|min:3',
        ]);
        if($valicate->fails()){
            return back()->withErrors($valicate); 
        }
        $categories = Categories::where('id',$id)->first();
        if(isset($categories)){
            $categories->update(['name' => $request->categoryName]);
             return redirect()->back()->with('success','Add Success');
        }else{
            return view('error.500');
        }
    }

}
