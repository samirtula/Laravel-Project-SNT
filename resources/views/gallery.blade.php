@extends('layouts/app')
@section('title', 'Фотогалеря')
@section('content')


    <section class="gallery-image images">
      <div class="gallery-image__title">
        <div class="gallery-image__title-headers">
          <h1>фотогалерея</h1>
        </div>
      </div>
    </section>
    <section class="gallery">
      <div class="gallery__wrapper">
        <div class="gallery__carousel owl-carousel owl-theme">
            @foreach($data as $item)
                <div style="background: url({{$item->img_path}}); background-size: cover" title="{{$item->description}}" class="item"></div>
            @endforeach
        </div>
        <div class="gallery__images">
          <h2>наше товарищество</h2>
            @foreach($data as $item)
                <div style="background: url({{$item->img_path}}); background-size: cover" title="{{$item->description}}" class="item"></div>
            @endforeach
        </div>
      </div>
    </section>
    <div class="popup">
      <div class="popup__close-button"></div><img class="popup__image" src="images/letter/letter.jpg">
    </div>

    <script src="../js/gallery.js"></script>
@stop
