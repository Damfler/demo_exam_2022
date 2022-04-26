@extends("layout")

@section("content")
	<div class="head">Ваши заявки</div>
	<p class="small">Все | Новые | Решённые | Отклонённые</p>
	<!-- Вывод данных запросов -->
	<div class="row">
		@if(count($app))
			@foreach($app as $val)
				<div class="col">
					<h3>{{ $val->title }}</h3>
					<p class="center">Статус заявки: <b>{{ $val->status }}</b></p>
					<p>Категория заявки: <b>{{ $val->category }}</b></p>
					<p class="center"><b>Описание:</b></p>
					<p>{{ $val->description }}</p>
					@if($val->status == "Новая")
						<p class="small"><a onclick="return window.confirm('Вы действительно хотите удалить заявку?')" href="/profile/app/{{ $val->application_id }}/delete">Удалить заявку</a></p>
					@elseif($val->status == "Отклонена")
						<p class="center"><b>Причина отклонения:</b></p>
						<p>{{ $val->rejection_reason }}</p>
					@endif
					<p class="small">{{ $val->created_at }}</p>
				</div>
			@endforeach
		@else
			<h3>Данные отсутствуют</h3>
		@endif
	</div>

	<div class="head">Добавить заявку</div>
	<form action="/profile/app-add" enctype="multipart/form-data" method="POST">
		@csrf
		<input type="text" name="title" placeholder="Название (до 64 символов)" required pattern=".{1,64}">
		<textarea name="description" placeholder="Описание (до 256 символов)" required pattern=".{1,256}"></textarea>
		<select required name="category">
			<option value selected disabled>Категория заявки</option>
			@if(count($categories))
				@foreach($categories as $val)
					<option value="{{ $val->category }}">{{ $val->category }}</option>
				@endforeach
			@endif
		</select>
		<p class="left">Фотография заявки</p>
		<input type="file" required name="image">
		<button>Создать заявку</button>
	</form>
@endsection