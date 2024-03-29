@php
    echo 'Hello world' . '<br>';
    $name = 'Mohamed Adel';
    $books = ['PHP', 'Java', '.NET'];
@endphp
{{ $name }}
<br>
@php
    echo $name; // Output: Mohamed Adel
@endphp
<br>
{!! $localName !!}
<hr>
@foreach ($books as $book)
    {{ $book }} <br>
@endforeach
<hr>
@foreach ($dogs as $dog)
    {{ $dog }} <br>
@endforeach
