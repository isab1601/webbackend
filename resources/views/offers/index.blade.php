<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    @foreach ($offers as $offer)
        <li><a href="offers/{{$offer->id}}">
                {{$offer->title}}</a></li>
    @endforeach
</ul>
</body>
</html>
