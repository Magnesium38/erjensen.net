<header class="page-header">
    <nav class="">
        <a href="/" title="Eric Jensen" class="header-logo">Logo image here.</a>
        <ul class="nav flex">
            @foreach ($headerLinks as $link)
                <li class="nav-item">
                    <a href="{{ $link['route'] }}" class="nav-link">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>