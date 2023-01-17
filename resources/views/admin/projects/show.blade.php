@extends('layouts.admin')

@section('content')
<h1>{{$project->title}}</h1>
<hr>
<h5>Slug: {{$project->slug}}</h5>
<img src="{{asset('storage/' . $project->cover_image)}}" alt="">
<div class="type">
    <strong>Type:</strong>
    {{ $project->type ? $project->type->name : 'Uncategorized'}}
</div>
<p>Description: {{$project->description}}</p>
@endsection