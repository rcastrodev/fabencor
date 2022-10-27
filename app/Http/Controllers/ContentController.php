<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function content()
    {
        return null;
    }

    public function findContent($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroyImage($id, $reg)
    {
        $element = Content::find($id);
        if(Storage::disk('public')->exists($element->$reg))
            Storage::disk('public')->delete($element->$reg);

        $element->$reg = null;
        $element->save();

        return response()->json([], 200);
    }

    public function heroUpdate(Request $request)
    {
        $data = $request->all();
        $content = Content::find($request->input('id'));

        if($request->hasFile('image')){
            if (Storage::disk('public')->exists($content->image))
                    Storage::disk('public')->delete($content->image);
            
            $data['image'] = $request->file('image')->store('images', 'public');
        }     
        $content->update($data);
        return response()->json([], 200);
    }
}
