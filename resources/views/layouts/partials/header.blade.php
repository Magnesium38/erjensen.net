<header class="page-header">
    <div class="container">
        <nav class="">
            <ul class="nav nav-pills">
                <li class="header nav-item">
                    <a href="/" class="nav-link">
                        {{--<img src="http://i.imgur.com/RRpkxCz.png">--}}
                        <img src="/img/logo.png">
                    </a>
                </li>
                @foreach ($headerLinks as $link)
                    <li class="header nav-item">
                        <a href="{{ $link['route'] }}" class="nav-link">
                            {{ strtoupper($link['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>