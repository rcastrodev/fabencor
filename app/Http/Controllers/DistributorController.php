<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DistributorController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'home')->first();
    }

    public function content()
    {
        $section_2   = $this->page->sections->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.distributor.content', compact('section_2'));
    }
    
    public function update(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/distributor','public');
        } 

        $element->update($data);

        return back();
    }

    public function destroy($id)
    {
        
    }
}
