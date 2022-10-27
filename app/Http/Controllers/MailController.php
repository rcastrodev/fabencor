<?php

namespace App\Http\Controllers;

use App\Data;
use App\Newsletter;
use App\Mail\QuoteEmail;
use App\Mail\ContactMail;
use App\Mail\CorrugadoMail;
use Illuminate\Http\Request;
use App\Mail\CajaEstandartMail;
use App\Mail\CajasEspecialesMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function cajasMedidasEstandart(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email:rfc,dns',
            'phone'     => 'required',
        ], [
            'name.required'     => 'Nombre es requerido',
            'email.required'    => 'Correo es requerido',
            'email.email'       => 'el correo de tener un formato valido',
            'phone.required'    => 'Teléfono es requerido',
        ]);

        $data = $request->all();
        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'public');

        $email = Data::first()->email;

        if(isset($email)){
            try {
                Mail::to($email)->send(new CajaEstandartMail($data));
                $request->session()->forget('vps');
                $mensaje = 'Correo enviado';
                $class = 'success';
            } catch (\Throwable $th) {
                $mensaje = 'Error al enviar correo';
                $class = 'danger';
                Log::error($th->getMessage());
            }  
        }else{
            $mensaje = 'no hay correo de empresa';
        }  

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }

    public function cajasEspeciales(Request $request)
    {
        $request->validate([
            'largo'      => 'required',
            'ancho'      => 'required',
            'alto'       => 'required',
            'name'       => 'required',
            'email'      => 'required|email:rfc,dns',
            'phone'      => 'required',
        ], [
            'name.required'     => 'Nombre es requerido',
            'email.required'    => 'Correo es requerido',
            'email.email'       => 'el correo de tener un formato valido',
            'phone.required'    => 'Teléfono es requerido',
            'largo.required'    => 'Largo es requerido',
            'ancho.required'    => 'Ancho es requerido',
            'alto.required'     => 'Alto es requerido',
        ]);

        $data = $request->all();
        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'public');

        $email = Data::first()->email;

        if(isset($email)){
            try {
                Mail::to($email)->send(new CajasEspecialesMail($data));
                $mensaje = 'Correo enviado';
                $class = 'success';
            } catch (\Throwable $th) {
                $mensaje = 'Error al enviar correo';
                $class = 'danger';
                Log::error($th->getMessage());
            }  
        }else{
            $mensaje = 'no hay correo de empresa';
        }  

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }

    public function corrugado(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email:rfc,dns',
            'phone'      => 'required',
        ], [
            'name.required'     => 'Nombre es requerido',
            'email.required'    => 'Correo es requerido',
            'email.email'       => 'el correo de tener un formato valido',
            'phone.required'    => 'Teléfono es requerido',
        ]);

        $data = $request->all();
        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'public');

        $email = Data::first()->email;

        if(isset($email)){
            try {
                Mail::to($email)->send(new CorrugadoMail($data));
                $mensaje = 'Correo enviado';
                $class = 'success';
            } catch (\Throwable $th) {
                $mensaje = 'Error al enviar correo';
                $class = 'danger';
                Log::error($th->getMessage());
            }  
        }else{
            $mensaje = 'no hay correo de empresa';
        }  

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'email'     => 'required|email:rfc,dns',
            'mensaje'   => 'required'
        ],[
            'nombre.required'               => 'Nombre es requerido',
            'email.required'                => 'Correo es requerido',
            'email.email'                   => 'Correo debe tener un formato valido',
            'termino.required'              => 'Debe aceptar los terminos',
        ]);

        $email = Data::first()->email;
        if(isset($email)){
            try {
                Mail::to($email)  
                    ->send(new ContactMail($request->all()));
                
                $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
                $class = 'success';
    
            } catch (\Throwable $th) {
                $mensaje = 'Error al enviar correo';
                $class = 'danger';
                Log::error($th->getMessage());
            }
        }else{
            $mensaje = 'Error al enviar correo';
            $class = 'danger';            
        }

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }
}