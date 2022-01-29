<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Cafeteria | @yield('title')</title>
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	@yield('css')
</head>

<body >
	<main id="app" class="template">
		{{-- Menu --}}
		<aside class="template__aside">
			<h1 class="template__title">Cafeteria</h1>
			<hr>
			<nav class="template__menu">
				<ul>
					<li class="template__menu-item">
						<a href="/">Productos</a>
					</li>
					<li class="template__menu-item">
						<a href="/categorias">Categorias</a>
					</li>
					<li class="template__menu-item">
						<a href="/ventas">Ventas</a>
					</li>
				</ul>
			</nav>
		</aside>

		{{-- Content --}}
		<section  class="template__content">
			@yield('content')
		</section>

	</main>

	<script src="{{ mix('/js/app.js') }}" charset="utf-8"></script>
	@yield('js')
</body>

</html>
