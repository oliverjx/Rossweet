<?php
namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoController extends Controller
{
    public function enviar(Request $request)
    {
        // Validar y obtener los datos del formulario
        $nombre = $request->input('name');
        $correo = $request->input('email');
        $mensaje = $request->input('message');

        // Enviar el correo electrónico
        Mail::to('rossweetOficial@outlook.com')->send(new EnviarEmail($nombre, $correo, $mensaje, "respuesta del formulario"));
        Mail::to('oliverjaimemartinez@gmail.com')->send(new EnviarEmail($nombre, $correo, $mensaje, "respuesta del formulario"));

     return view ('layouts.index');
        
    }
    public function enviar_user(int $r, User $user)
    {
        
        switch ($r) {
            case 1:
                $mensaje = "su pedido ha sido Aceptado";
                break;
            
            case 2:
                $mensaje = "su pedido ha sido Cancelado";
                break;
            
            case 3:
                $mensaje = "su pedido ha sido Entregado";
                break;
            
            default:
                # code...
                break;
        }

        // Enviar el correo electrónico
        Mail::to($user->mail)->send(new EnviarEmail("Rossweet - WEB", "rossweetOficial@outlook.com", $mensaje, "Notificacion de Rossweet-Web"));

     
        
    }
}
