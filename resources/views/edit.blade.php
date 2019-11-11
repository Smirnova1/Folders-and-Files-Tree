@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <form method="POST" action="{{ url('/path/' . $folder->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button class="btn btn-info mb-3" id="save" type="submit">SAVE</button>

            <div class="form-group">
                <label class="font-weight-bold" for="path1">Path to file:</label>
                <input class="form-control" type="text" id="path1"
                       value="{{$folder->folder_path}}" name="f-path">
            </div>
            <div class="form-group">
                <input type="text" hidden id="result" name="result">
            </div>
        </form>

        <span class="font-weight-bold">Right click on the folder or file to edit</span>
        <div id="tree-container">
            <ul data-jstree='{"icon":"//jstree.com/tree.png"}'>
                @foreach($treeArray as $key=>$value)
                    @if (is_array($value))
                        <li data-jstree='{"icon":"//jstree.com/tree.png"}'>
                            {{$key}}/
                            @include('partials.edit-tree',array('items' => $value))
                        </li>
                    @else
                        <li data-jstree='{"icon":"fa fa-leaf"}'>{{$value}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection