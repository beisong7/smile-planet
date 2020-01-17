@if(!empty(@$livejs))
    @foreach($livejs as $link)
        <script src='{{ $link }}'></script>
    @endforeach
@endif