<h2 class="endpoint" id="{{ $endpoint->slugify() }}">{{ $endpoint->action }}</h2>

@foreach(explode('\n', $endpoint->description) as $line)
    <p>{{ $line }}</p>
@endforeach

<h3>Authentication</h3>

{{ $endpoint->authentication or 'None' }}

<h3>Url</h3>

{{ $endpoint->method . ' ' . $endpoint->buildUrl() }}

<h3>Optional Query String Parameters</h3>

{{ $endpoint->options or 'None' }}

<h3>Example Request</h3>

{{ $endpoint->requestDescription or '' }}

{!! $endpoint->displayRequest() !!}

<h3>Example Response</h3>

{{ $endpoint->responseDescription or '' }}

{!! $endpoint->displayResponse() !!}