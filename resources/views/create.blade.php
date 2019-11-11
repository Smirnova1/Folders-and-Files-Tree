@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold" for="path">Path to file:</label>
                <input name="path" type="text" class="form-control form-control-lg" id="path" placeholder="Enter path to file" required>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-info text-right">Save</button>
            </div>
        </form>
    </div>
@endsection