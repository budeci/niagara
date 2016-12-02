<section class="section_video hidden-sm hidden-xs ">
    <div class="container">
        <h3>Видео</h3>
        <div class="carousel-container">
            <div id="carousel">
                @foreach($slides->getPublic($type='video') as $item)
                    @if(file_exists(public_path($item->image)))
                        <div class="carousel-feature">
                          <img class="carousel-image" alt="Image Caption" src="{{$item->image}}">
                            <div class="carousel-caption">
                                <a class="fancybox" rel="{{$item->id}}"  href="{{$item->link}}"><img src="/assets/images/play.png" alt=""></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>