@extends('layouts.admin')

@section('content')
<h1>Edit Project</h1>
@include('partials.error')
<form action="{{route('admin.projects.update', $project->slug)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="titleHelper" value="{{old('title', $project->title)}}">
        <small id="titleHelper" class="text-muted">Add title with max 100 characters</small>
    </div>
    <div class="mb-3">
        <img class="w-25" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        <div>
            <label for="cover_image" class="form-label">Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="cover_imageHelper">
            <small id="cover_imageHelper" class="text-muted">Replace image</small>
        </div>
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Types</label>
        <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
            <option value="">No Type</option>

            @forelse ($types as $type )
            <option value="{{$type->id}}" {{ old('type_id') == $type->id ? $project->type->id : ''}}>
                {{$type->name}}
            </option>
            @empty
            <option value="">Sorry, no types in the system.</option>
            @endforelse

        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="" aria-describedby="descriptionHelper">{{old('description', $project->description)}}</textarea>
        <small id="descriptionHelper" class="text-muted">Add a description with max 300 characters</small>
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection