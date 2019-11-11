@if(is_array($items))
    <ul class="list-group list-group-item-secondary">
        @foreach($items as $key=>$value)
            @if (is_array($value))
                <li class="list-group-item list-group-item-secondary">
                    <i class="fa fa-folder-open"></i> {{$key}}/
                    @include('partials.tree',array('items' => $value))
                </li>
            @else
                <li class="list-group-item list-group-item-info">
                    <i class="fa fa-file-o" aria-hidden="true"></i> {{$value}}</li>
            @endif

        @endforeach
    </ul>
@else
    <ul class="list-group list-group-item-info">
        {{$items}}</ul>
@endif