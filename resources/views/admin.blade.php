@extends("layout")

@section("content")
	<div class="head">Категории</div>
	<form action="/admin/category/add" method="POST">
		@csrf
		<div class="line">
			<input type="text" name="category" placeholder="Категория (до 64 символов)" required pattern=".{1,64}">
			<button>Добавить</button>
		</div>
	</form>
	<form action="admin/category/delete" method="POST">
		@csrf
		<div class="line">
			<select required name="category_id">
				<option value selected disabled>Категории</option>
				@if(count($categories))
					@foreach($categories as $val)
						<option value="{{ $val->category_id }}">{{ $val->category }}</option>
					@endforeach
				@endif
			</select>
			<button>Удалить</button>
		</div>
	</form>


	<div class="head">Новые заявки</div>
	<div class="row">
		@if(count($new))
			@foreach($new as $val)
				<div class="col">
					<img src="{{ asset('assets/'.$val->path_image_before) }}">
					<h3>{{ $val->title }}</h3>
					<p class="center">Статус заявки: <b>{{ $val->status }}</b></p>
					<p>Категория заявки: <b>{{ $val->category }}</b></p>
					<p class="center"><b>Описание:</b></p>
					<p>{{ $val->description }}</p>
					<h3>Одобрение заявки</h3>
					<form action="/admin/app/approve" enctype="multipart/form-data" method="POST">
						@csrf
						<input type="file" required name="image">
						<button value="{{ $val->application_id }}" name="app_id">Одобрить</button>
					</form>
					<h3>Отклонение заявки</h3>
					<form action="/admin/app/reject" method="POST">
						@csrf
						<textarea name="rejection_reason" placeholder="Причина отклонения (до 256 символов)" required pattern=".{1,256}"></textarea>
						<button value="{{ $val->application_id }}" name="app_id">Отклонить</button>
					</form>
					<p class="small">{{ $val->created_at }}</p>
				</div>
			@endforeach
		@else
			<h3>Данные отсутствуют</h3>
		@endif
	</div>



	<div class="head">Одобренные заявки</div>
	<div class="row">
		@if(count($approved))
			@foreach($approved as $val)
				<div class="col">
					<img src="{{ asset('assets/'.$val->path_image_after) }}">
					<h3>{{ $val->title }}</h3>
					<p class="center">Статус заявки: <b>{{ $val->status }}</b></p>
					<p>Категория заявки: <b>{{ $val->category }}</b></p>
					<p class="center"><b>Описание:</b></p>
					<p>{{ $val->description }}</p>
					<p class="small">{{ $val->created_at }}</p>
				</div>
			@endforeach
		@else
			<h3>Данные отсутствуют</h3>
		@endif
	</div>



	<div class="head">Отклоненные заявки</div>
	<div class="row">
		@if(count($rejected))
			@foreach($rejected as $val)
				<div class="col">
					<img src="{{ asset('assets/'.$val->path_image_before) }}">
					<h3>{{ $val->title }}</h3>
					<p class="center">Статус заявки: <b>{{ $val->status }}</b></p>
					<p>Категория заявки: <b>{{ $val->category }}</b></p>
					<p class="center"><b>Описание:</b></p>
					<p>{{ $val->description }}</p>
					<p class="center"><b>Причина отклонения:</b></p>
					<p>{{ $val->rejection_reason }}</p>
					<p class="small">{{ $val->created_at }}</p>
				</div>
			@endforeach

		@else
			<h3>Данные отсутствуют</h3>
		@endif
	</div>


@endsection