<footer>
    <div class="container">
        @if (count($footerLinks) > 0)
        <ul class="footer-nav flex">
            @foreach($footerLinks as $link)
                <li class="nav-item">
                    <a href="{{ $link['route'] }}" class="nav-link">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
        @endif
        <p class="copyright">&copy; Eric Jensen</p>
    </div>
</footer>
