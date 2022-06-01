<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <title>

      </title>
  </head>
  <body>
  <h1>Willkommen beim KWM - Nachhilfeportal</h1>
  <ul>
      @foreach ($offers as $offer)
          <li>{{$offer->title}}</li>
          <li>{{$offer->description}}</li>
      @endforeach

  </ul>
  </body>


</html>
