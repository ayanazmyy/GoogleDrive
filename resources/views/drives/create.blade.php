@extends('layouts.app')


@section('content')
<h1 class="text-center text-info">Upload file</h1>

<div class="container col-md-6">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-body">
           <form action="{{route('drives.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                 <label for="">Title</label>
                 <input type="text" name="title" class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Description</label>
                 <input type="text" name="description" class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Upload file</label>
                 <input type="file" name="inputFile" class="form-control">
             </div>
             <button type="submit" class="btn btn-info">Upload file</button>
    </form>
        </div>
    </div>
</div>

@endsection
