<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Content;
use App\Product;
use App\Service;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription($this->data->description);
        $sections   = $page->sections;
        $sliders    = Content::where('section_id', 1)->orderBy('order', 'ASC')->get();
        $qualities  = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        $section2   = Content::where('section_id', 2)->first();
        $section3   = Content::where('section_id', 3)->first();
        $products   = Product::where('category_id', 1)->where('outstanding', 1)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('sliders', 'qualities', 'section2', 'section3', 'products'));
    }

    public function empresa()
    {
        SEO::setTitle('empresa');
        SEO::setDescription($this->data->description);
        $sliders = Content::where('section_id', 4)->orderBy('order', 'ASC')->get();
        $section2 = Content::where('section_id', 5)->first();
        $section3s = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        $section4s = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();

        return view('paginas.empresa', compact('sliders', 'section2', 'section3s', 'section4s'));
    }

    public function cajasMedidasEspeciales()
    {
        $products = Product::where('category_id', 1)->orderBy('order', 'ASC')->get();
        return view('paginas.productos-cajas-medidas-especiales', compact('products')); 
    }

    public function productoCajasMedidasEspeciales($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::where('category_id', 1)->orderBy('order', 'ASC')->get();
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));
        return view('paginas.producto', compact('product', 'products'));
    }

    public function cajasMedidasEstandart()
    {
        $product = Product::where('category_id', 2)->first();
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));
        return view('paginas.cajas-medidas-estandart', compact('product'));
    }

    public function rollosCorrugadosSimpleFaz()
    {
        $product = Product::where('category_id', 3)->first();
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));
        return view('paginas.rollos-corrugados-simple-faz', compact('product'));       
    }

    public function solicitudDePresupuesto(Request $request)
    {
        // $request->session()->forget('vps');
        // dd(session('vps'));
        $page = Page::where('name', 'solicitudad-presupuesto')->first();
        SEO::setTitle("solicitud de presupuesto");
        SEO::setDescription($this->data->description);
        $product = Product::where('category_id', 3)->first();
        return view('paginas.solicitud-de-presupuesto', compact('product'));
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        SEO::setDescription($this->data->description);
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->data_sheet);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->data_sheet))
            Storage::disk('public')->delete($product->data_sheet);

        $product->data_sheet = null;
        $product->save();

        return response()->json([], 200);
    }
}
