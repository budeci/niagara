<section class="section_video hidden-sm hidden-xs ">
    <div class="container">
        <h3>Видео</h3>
        <div class="center_carousel">
            <div id="carousel">
                @foreach($slides->getPublic($type='video') as $item)
                    @if(file_exists(public_path($item->image)))
                        <a class="fancybox" rel="{{$item->id}}"  href="{{$item->link}}" target="_blank"><img src="{{Image::url($item->image,680,440,array('crop',false))}}" alt="{{$item->name}}"></a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>