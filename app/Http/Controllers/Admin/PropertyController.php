<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use App\Models\Owner;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $properties = Property::orderBy('id', 'desc')->get();

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // categorias
        $categories = Category::all();


        // zonas 
        $zones = Zone::all();

        return view('admin.properties.create', compact('categories', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:600'],
            'price' => ['required','integer'],
            'category_id' => ['required', 'integer'],
            'zone_id' => ['required', 'integer'],
            'name' => ['required', 'max:50']
        ]); 


        // Aqu[i estamos registrando la propiedad]
        $property = new Property();
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->user_id = auth()->user()->id; // Llevar un control de qu[e usuarios logados han registrado esa propiedad]
        $property->category_id = $request->category_id;  
        $property->zone_id = $request->zone_id;
        $property->save();

        
        $owner = new Owner();
        $owner->name = $request->name;
        $owner->property_id = $property->id;
        $owner->save();

        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($property)
    {

        $property = Property::find($property);

        // categorias
        $categories = Category::all();


        // zonas 
        $zones = Zone::all();

        return view('admin.properties.edit', compact('categories', 'zones', 'property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $property)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:600'],
            'price' => ['required','integer'],
            'category_id' => ['required', 'integer'],
            'zone_id' => ['required', 'integer'],
            'name' => ['required', 'max:50']
        ]); 


        $property = Property::find($property);
        
        $status_name = '';

        if ($request->status == 1) {
            $status_name = 'draft';
        } else if ($request->status == 2) {
            $status_name = 'hidden';
        } else {
            $status_name = 'visible';
        }

        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $status_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'zone_id' => $request->zone_id,
        ]);


        // Para actualizar el nombre del propietario
            

        /*
            PRIMERA FORMA DE SOLUCION, A TRAVES DE LA RELACION Y EL MODELO
            En la variable property tenemos el el objeto del a propiedad actualizada, por lo tanto, podemos acceder a su relacion con duenios.

            Dado que se trata de una relacion uno a muchos, en que cada propiedad puede tener uno o mas propietarios, 
            utilizamos el metodo first para acceder al primer elemento de la coleccion de propietarios, que es el que queremos actualizar (esto por que en nuestros
            formularios de registro de propiedad solo permitimos asociar un propietario por propiedad), por lo tanto, siempre que actualicemos el propietario, actualizaremos el primer elemento de la relacion.
            
            A continuacion, accedemos al metodo update para actualizar el registro de la relacion, el cual recibe un array con el campo que quremos actualizar

            IMPORTANTE!!!! Para que esto funcione, debemos aniadir el campo name (o los que fueran a actualizarse) a la propiedad fillable del modelo Owner (ver clase Owner.php)
        */
/*         $property->owner()->first()->update([
            'name' => $request->name //Actualizamos el nombre de la relacion, con el nombre del campo que nos llega del formulario, correspondiente al nombre del propietario.
        ]); */

        /*
            SEGUNDA FORMA DE SOLUCION, A TRAVES DEL ID DEL DUENIO DE LA PROPIEDAD

            Esta Solucion es mas optima en caso que perimtamos registrar uno o mas duenios por propiedad (en caso de que nuestro formulario de registro lo permita)
            Lo que hacemos es enviar el ID del propietario que queremos actualizar (o ids en caso de ser mas de uno) y recibimos este ID en el contorlador 
            para buscar directamente el propietario a actualizar

            la siguiente region de codigo comentada es la segunda alternativa u opcion
        */


/*         // primero comprobamos que este llegando el campo owner id desde el formulario
        if ($request->owner_id) {
            $owner = Owner::find($request->owner_id);

            // En este punto, la variable owner ya tendria el registro del duenio que quereoms actualizar.
            $owner->update([
                'name' => $request->name 
            ]);
        } */

        return redirect()->route('admin.properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
