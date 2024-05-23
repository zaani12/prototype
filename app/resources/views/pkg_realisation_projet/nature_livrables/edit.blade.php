@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Nature Livrable</h1>
    <form action="{{ route('nature-livrables.update', $dataToEdit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Name:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $dataToEdit->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $dataToEdit->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-info">Update</button>
    </form>
</div>
@endsection

