@extends("layout")

@section("content")
	<div class="head">Последние одобренные заявки</div>
	<p class="small">Количество одобренные заявок - {{ $count }}</p>
	<div class="row">

		@if(count($app))

			@foreach($app as $val)


				<div class="col">
					<img src="{{ asset('assets/'.$val->path_image_after) }}" alt="">
					<h3>{{ $val->title }}</h3>
					<p>Категория заявки: <b>{{ $val->category }}</b></p>
					<p class="small">{{ $val->created_at }}</p>
				</div>

			@endforeach

		@else

			<h3>Данные отсутствуют</h3>	

		@endif

	</div>

	<div class="head" id="register">Регистрация</div>
	<form action="/register" method="POST">
		@csrf
		<input type="text" name="fio" placeholder="ФИО (кириллица, дефис, пробел, до 32 символов)" pattern="[а-яА-ЯёЁ\-\s]{1,32}" required>
		<input type="text" name="login" placeholder="Логин (латиница, до 16 символов)" pattern="[a-zA-Z]{1,16}" required>
		<input type="email" name="email" pattern=".{1,32}" placeholder="Email (наличие @, до 32 символов)" required>
		<input type="password" name="password" pattern=".{1,32}" placeholder="Пароль (до 32 символов)" required>
		<input type="password" name="password_check" placeholder="Повтор пароля" required>
		<div class="line">
			<input type="checkbox" required>
			<p>Согласие на обработку персональных данных</p>
		</div>
		<button>Зарегистрироваться</button>
	</form>

	<div class="head" id="login">Войти</div>
	<form action="/login" method="POST">
		@csrf
		<input type="text" required name="login" placeholder="Логин">
		<input type="password" required name="password" placeholder="Пароль">
		<button>Войти</button>
	</form>
@endsection