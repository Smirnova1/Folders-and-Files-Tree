@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div>
            <h1 class="display-6">Welcome</h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Click "Add path" to add a new path.</li>
                <li class="list-group-item">Click "All paths" to see all added paths.</li>
            </ul>
        </div>
        <div class="mt-4">
            <button class="btn btn-info mb-3 btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                All paths
            </button>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <p class="font-weight-bold text-secondary">Click on the link to see the structure of directories and files.</p>
                @foreach($allFolders as $folder)
                    <div>
                        <a class="text-decoration-none" href="{{url('/path/' . $folder->id)}}">{{$folder->folder_path}}</a>
                    </div>
                @endforeach
                @if(empty($allFolders[0]))
                    <div>
                        <a class="text-decoration-none" href="{{route('create')}}">ADD PATH</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection