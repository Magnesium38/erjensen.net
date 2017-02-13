<footer class="page-footer">
    <div class="container">
        <nav>
            <ul class="nav nav-pills">
                <li class="footer nav-item copyright">
                    &copy; Eric Jensen
                </li>
                @foreach($footerLinks as $link)
                    <li class="footer nav-item">
                        <a href="{{ $link['route'] }}" class="nav-link">{{ $link['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</footer>
