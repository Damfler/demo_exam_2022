@php
	if(Auth::check())
		$role = Auth::user()->role;
	else $role = "guest";
@endphp

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demoexam2022</title>
	<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>

	<header>
		<div class="top">
			<h1>Заголовок</h1>
			<h2>Дополнительный текст</h2>
		</div>
		<div class="content">
			<nav>
				@if($role == "admin")
					<p><a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt=""></a></p>
					<p><a href="/profile">Личный кабинет</a></p>
					<p><a href="/admin">Заявки</a></p>
					<p><a href="/logout">Выход</a></p>
				@elseif($role == "user")
					<p><a href="/profile">Личный кабинет</a></p>
					<p><a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt=""></a></p>
					<p><a href="/logout">Выход</a></p>
				@else
					<p><a href="/#register">Регистрация</a></p>
					<p><a href="/"><img src="{{ asset('assets/logo/logo.png') }}" alt=""></a></p>
					<p><a href="/#login">Войти</a></p>
				@endif
			</nav>
		</div>
	</header>

	<div class="message">{{ $errors->message->first() }}</div>

	<main>
		<div class="content">
			
			@yield("content")

		</div>
	</main>

</body>
</html>