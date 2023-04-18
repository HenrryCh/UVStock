<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class PerfilController extends Controller
{
    //Muestra imagen en view app
    public function index()
        {
            $user = auth(); // obtiene el usuario autenticado
            $profilePhoto = User::find($user->id)->profile_photo_path; // obtiene la foto de perfil del usuario actual
            return view('layouts.app', ['user' => $user, 'profilePhoto' => $profilePhoto]);
        }
        
    //Guarda, cambia foto de perfil
    public function profileguardar(Request $request){
        $user = User::find(auth()->id());
        if($request->hasFile("imagen")){
            $imagen =$request->file("imagen");
            $nombreimagen =Str::slug($user->name).".".$imagen->guessExtension();
            $ruta = public_path("img/profile/");
            $imagen->move($ruta,$nombreimagen);
            //rescatamos modelo
            $user->profile_photo_path = $nombreimagen;
        }
        $user->save();
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
    
    //Muestra modo editar foto
    public function editarphoto(){
    //$usuario = auth()->user();
    return view('layouts.edit');    
    }
}