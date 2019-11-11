@if(is_array($items))
    <ul>
        @foreach($items as $key=>$value)
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
@else
    <ul>{{$items}}</ul>
@endif