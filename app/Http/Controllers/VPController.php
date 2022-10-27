<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VPController extends Controller
{
    function addVP(Request $request)
    {
        $vps = session('vps');
        $add = true; // Verificar
    
        // Si tiene valores
        if ($vps) {
            foreach ($vps as $k => $vp) {
                if($k == $request->id){
                    $vps[$k]['measures'] = $request->measures;   
                    $add = false;
                }
            }
            // Si tiene pero no coincide con ninguno 
            if ($add)
                $vps[$request->id] = $request->all();
            
        }else{
            $vps = [$request->id => $request->all()];
        }

        session(['vps' => $vps]); 
        
        return response()->json([], 201);
    }

    function destroy($id)
    {
        $vps = session('vps');
        unset($vps[$id]);
        session(['vps' => $vps]);  
        return response()->json([session('vps')], 200);
    }
    
}
