@extends('base.app')

@section('titulo', 'Listagem de status')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div style="background-color: #F2D1F5; display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding: 15px 30px; width: 100%">
  <div>
     <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <img style="width: 6em; display: inline-block;" 
            src="../../imagens/gota-sangue.png" alt="imagem">
    </x-responsive-nav-link>

    <p style="font-weight: bold;font-size: 16px; display: inline-block; margin-left: 1em">
      Listagem de status
    </p>
  </div>

</div>

    <div style="width:100%; padding: 40px">
        <h3 style="font-size: 18px">Encontre seus status</h3>

        <div style="align-self:center;" id="formulario">
            <form action="{{ route('status.search') }}" method="post" class="row g-3">
            @csrf <!-- cria um hash de segurança -->
            <div class="col-md-8">
                <select style="border: 1px solid #F2D1F5; border-radius: 5px;" name="tipo" >
                    <option value="nome_digestao">Digestão</option>
                    <option value="nome_exercicio">Exercícios</option>
                    <option value="nome_pele">Pele</option>
                </select> 
            <input style="border: 1px solid #F2D1F5; border-radius: 5px" type="text" name="valor" placeholder="Pesquisar">
            
            <button type="submit" style="padding: 5px; 
                text-align: center; 
                display: inline-block; 
                font-size: 16px;
                background-color: #C770D1; 
                width: 100px;  
                height: 40px;
                border-radius: 5px;
                color: white;
                font-size: 15px">Buscar
            </button>

            <button style="padding: 5px; 
                text-align: center; 
                display: inline-block; 
                font-size: 16px;
                background-color: #C770D1; 
                width: 100px;  
                height: 40px;
                border-radius: 5px;">
                <a href="{{ route('status.create') }}" style="color:white; text-decoration:none">Cadastrar</a>
            </button>
            </div>
        </form>
        </div>
    </div>

    <div style="width: 100%; padding: 40px">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @php
            $hoje = date('d/m/Y');
        @endphp

        @foreach ($statuss as $item)
         <div class="col">
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@php echo $hoje @endphp </h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Digestão: {{ $item->nome_digestao }}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Exercícios: {{ $item->nome_exercicio }}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Pele: {{ $item->nome_pele }}</h6>
                    <a style="color: #C770D1" href="{{ route('status.edit', $item->id) }}">Editar</a>
                    <a style="color: #C770D1; margin-left: 10px" href="{{ route('status.destroy', $item->id) }}">Excluir</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@endsection
