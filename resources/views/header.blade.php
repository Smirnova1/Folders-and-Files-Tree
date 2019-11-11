<nav>
    <ul class="nav nav-tabs justify-content-end mb-4">
        <li class="nav-item">
            <a class="nav-link @if(url()->current() === route('index')) active @endif"
               href="{{route('index')}}">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(url()->current() === route('create')) active @endif"
               href="{{route('create')}}">ADD PATH</a>
        </li>
    </ul>
</nav>

