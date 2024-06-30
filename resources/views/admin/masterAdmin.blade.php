<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}" />
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />


<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet"
	href="{{ asset('css/bootstrap-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />

<title>Painel de Controle</title>
</head>
<body>

	@include('admin/menu')

	@include('livraria/mensagens')

    
	
	@yield('content')
	

	@include('admin/rodape')




	