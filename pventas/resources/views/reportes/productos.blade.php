<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos</title>
  <style>
  table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td, th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  tr:nth-child(even){
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  <h1>Lista de Productos</h1>
    <table>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Categoria</th>
        <th>Estado</th>
      </tr>
      @foreach($productos as $p)
        <tr>
          <td>{{$p->codigo}}</td>
          <td>{{$p->nombre}}</td>
          <td>Q.{{$p->precio}}</td>
          <td>{{$p->stock}}</td>
          <td>{{$p->categoria}}</td>
          <td>{{$p->estado}}</td>
        </tr>
      @endforeach
    </table>
</body>
</html>
