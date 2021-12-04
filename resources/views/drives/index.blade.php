@extends('layouts.app')


@section('content')
<h1 class="text-center text-info">Your files</h1>
@if(Session::has('done'))
<div class="alert alert-success w-50 mx-auto text-center">
    {{Session::get('done')}}
</div>
@endif
<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th colspan="3">Action</th>
                </tr>
                @foreach($drives as $data)
                <tr>
                    <th>{{$data->title}}</th>
                    <th>
                        <a href="{{route('drives.show', $data->id)}}">
                           <i class="fas text-primary fa-eye" style="font-size: 25px"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{route('drives.edit', $data->id)}}">
                           <i class="fas text-success fa-edit" style="font-size: 25px"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{route('drives.destroy', $data->id)}}">
                           <i class="fas text-danger fa-trash-alt" style="font-size: 25px"></i>
                        </a>
                    </th>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

@endsection
