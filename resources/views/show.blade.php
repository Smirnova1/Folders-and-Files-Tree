@extends('layouts.app')
@section('content')
    <a href='{{url('/path/' . $tree->id . '/edit')}}'>
        <button class="btn btn-info mb-3" type="button">
            EDIT
        </button>
    </a>
    <form action="{{ url('/path/' . $tree->id . '/delete') }}" method="post">
        <input class="btn btn-info mb-3" type="submit" value="DELETE" />
        @method('delete')
        @csrf
    </form>
    <div class="mx-auto" style="max-width: 1000px">
        <i class="fa fa-folder-open"></i>
        <ul class="list-group list-group-item-secondary">
            @foreach($treeArray as $key=>$value)
                @if (is_array($value))
                    <li class="list-group-item list-group-item-secondary">
                        <i class="fa fa-folder-open"></i> {{$key}}/
                        @include('partials.tree',array('items' => $value))
                    </li>
                @else
                    <li class="list-group-item list-group-item-info">
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        {{$value}}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

@endsection