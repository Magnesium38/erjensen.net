<h1 id="{{ $reference->slug }}" class="reference-title"></h1>

<table class="endpoint">
    <thead>
        <tr>
            <th>Endpoint</th>
            <th style="text-align: left">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reference->endpoints() as $endpoint)
            <tr>
                <td>
                    <a href="#{{ $endpoint->slugify() }}">{{$endpoint->action}}</a>
                </td>
                <td>
                    {{ $endpoint->description }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>