<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/category','public');

        if($request->hasFile('brand_image'))
            $data['brand_image'] = $request->file('brand_image')->store('images/category','public');

        Category::create($data);
        
        return response()->json([], 201);
    }

    public function update(CategoryRequest $request)
    {
        $element = Category::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/category','public');
        }   

        if($request->hasFile('brand_image')){
            if(Storage::disk('public')->exists($element->brand_image))
                Storage::disk('public')->delete($element->brand_image);
            
            $data['brand_image'] = $request->file('brand_image')->store('images/category','public');
        }   

        $element->update($data);
    }

    public function find($id)
    {
        $content = Category::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Category::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        if(Storage::disk('public')->exists($element->brand_image))
            Storage::disk('public')->delete($element->brand_image);

        $element->delete();
        return response()->json([], 200);
    }


    public function getList()
    {
        $categories = Category::orderBy('order', 'ASC');
        return DataTables::of($categories)
        ->editColumn('image', function($category) {
            return '<img src="'.asset($category->image).'" width="150" height="50">';
        })
        ->editColumn('brand_image', function($category) {
            return '<img src="'.asset($category->brand_image).'" width="150" height="50">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'brand_image'])
        ->make(true);
    }

}
