@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Novidades</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @foreach($posts as $post)
				<h5>Categoria: {{ $post->category->name }}</h5>
				<section class="border border-grey p-5 mb-5">
					<h3 style="text-align: center">{{ $post->title }}</h3>
					<h6>Resumo: {{ $post->summary }}</h6>
					<div class="mt-5">
						{{ $post->text }}
					</div>
					<div class="mt-5">
						<i>
							<span>Publicado em: </span>
						{{ date( 'd/m/Y' , strtotime($post->post_date)) }}
					</i>
					</div>
				</section>
			@endforeach
        </div>
    </div>
</div>
@endsection
