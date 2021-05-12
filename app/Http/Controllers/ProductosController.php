<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        //$productos = \DB::table('marcas')
        //     ->join('productos', 'productos.marca_id', '=', 'marcas.id')
        //     ->paginate(5);
        //dd($productos);
        return view('productos.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //if($marca)
        //$marca_id = $marca->id;
        //$marca = new Marca();
        //$marca->nombre = $request->get('marca');
        //$marca->save();
        //$records = \DB::table('marcas')
        //     ->join('productos', 'productos.marca_id', '=', 'marcas.id')
        //     ->paginate(1);
        //dd($records);
         
        //die();
        //$marca = \Marca::find(1);
        //$nombre_marca = $marca->producto->nombre;
        //dd($records->productos); die();
        //dd($records->productos); die();
        $producto = new Producto();
        $producto->marca_id = 1;
        $producto->nombre = $request->get('nombre');
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        
        $producto->save();
        //$marca->save();
        
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $producto = Producto::find($id);
       return view('productos.edit')->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->marca_id = $request->get('marca');
        $producto->nombre = $request->get('nombre');
        $producto->codigo = $request->get('codigo');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        
        $producto->save();
        //$marca->save();
        
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }
}
