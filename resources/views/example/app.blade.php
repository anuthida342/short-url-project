@if($message = Session::get('success'))
    <p> {{ $message }}</p>
@endif

<a href="/new">create</a>
<p>Your Quota Remaining {{ 10-count($links) }}/10</p>
@if(!$links->isEmpty())
    <table>
        <tr>
            <td>longurl</td>
            <td>shorturl</td>
            <td>create</td>
        </tr>
        @foreach($links as $link)
            <tr>
                <td>{{ $link->longurl }}</td>
                <td><a href="/gt/{{ $link->shorturl }}" target="_blank">{{ $link->shorturl }}</a></td>
                <td>{{ $link->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endif
