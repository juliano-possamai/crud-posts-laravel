@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<h1>Postagens</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			@include('partials.errors')

			@if($post->id)
			<form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
			{{ method_field('PUT') }}
			@else
			<form action="{{ route('posts.store') }}" method="post">
			@endif

				{{ csrf_field() }}
				@if($post->id)
					<div class="form-row">
						<div class="form-group col-md-2">
							<label for="dataCriacao">Criado em: </label>
							<input type="text" name="dataCriacao" id="dataCriacao" class="form-control" value="{{ date( 'd/m/Y' , strtotime($post->post_date)) }}" disabled>
						</div>
					</div>
				@endif
				<div class="form-row">
					<div class="form-group col-md-3">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Selecione...</option>
                            @foreach($categories as $category)
								@if($category->id == $post->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Digite o título da postagem" value="{{ $post->title }}">
                    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
                        <label for="summary">Resumo</label>
                        <input type="text" name="summary" id="summary" class="form-control" placeholder="Digite um breve resumo sobre a publicação" value="{{ $post->summary }}">
                    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
                        <label for="text">Conteúdo</label>
                        <textarea name="text" id="text" rows="5" class="form-control" placeholder="Digite a conteúdo da publicação">{{ $post->text }}</textarea>
                    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="custom-control custom-switch">
							@if($post->active)
								<input type="checkbox" name="active" id="active" class="custom-control-input" value="1" checked>
							@else
								<input type="checkbox" name="active" id="active" class="custom-control-input" value="1">
							@endif
							<label for="active" class="custom-control-label">Postagem ativa</label>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Salvar</button>

		</form>
	</div>
</div>
@endsection