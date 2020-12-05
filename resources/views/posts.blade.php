@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<h1>Fórum - Postagens</h1>
			<a href="{{ route('posts.create') }}" class=" btn btn-success">Inserir</a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<table class="table table-hover table-bordered">
				<tr>
					<th>ID</th>
					<th>Título</th>
					<th>Resumo</th>
					<th>Categoria</th>
					<th>Ativo</th>
					<th>Ações</th>
				</tr>
				@foreach($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->summary }}</td>
						<td>{{ $post->category->name }}</td>
						<td>
							@if($post->active)
								Sim
							@else
								Não
							@endif
						</td>
						<td>
							<form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
								{{ method_field('DELETE')}}
								{{ csrf_field() }}
								<div class="btn-group">
									<a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info">Editar</a>
									<button type="submit" class="btn btn-danger">Excluir</button>
								</div>
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection