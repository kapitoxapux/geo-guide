@extends('app')

@section('styles')
    <link href="/css/fancybox.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="wrapper">
        @foreach ($collection as $item)
            <article>
                <div class="zadacha_1 d-flex align-items-center">
                    <div class="part_1">
                        <ul class="uslovia m-0 p-0">
                            <li class="uslovia_1 text-center">{{$item->introtext}}</li>
                            <li class="uslovia_2">
                                <a href="/geodesy/{{$item->id}}" target="_blank" title="{{$item->introtext}}">
                                    {{$item->description}}
                                </a>
                            </li>
                            {{--<li class="zadacha_image">
                                <a data-fancybox="gallery" href="{{$item->image?'storage/'.$item->image->path:'/images/coming-soon.jpg'}}">
                                    <img src="{{$item->image?'storage/'.$item->image->path:'/images/coming-soon.jpg'}}" alt="img">
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    {{ $collection->links() }}
@endsection

@section('scripts')

@endsection
