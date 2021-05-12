@extends('layouts.base');
@section('contenido')
<a href="productos/create" class="btn btn-primary">Crear</a>
<table class = table table-dark table striped mt-4>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Marca</th>
            <th scope="col">Nombre</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->marca_id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->codigo }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->precio }}</td>
        <td>
            <form action=" {{ route('productos.destroy',$producto->id) }} " method="POST">
            <!--form action=" /Productos/{{ $producto->id}}/delete" method="POST"-->
            <a href="/productos/{{ $producto->id }}/edit" class = btn btn-info>Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            
            </form>
            
        </td>
    </tr>
    @endforeach
    </tbody>
        
</table>
@endsection


