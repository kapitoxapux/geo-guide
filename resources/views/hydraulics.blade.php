@extends('app')

@section('styles')
    <link href="/css/fancybox.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="wrapper">
        @foreach ($collection as $item)
            <article id="{{$item->id}}">
                <div class="zadacha_1 d-flex align-items-center">
                    <div class="part_1">
                        <ul class="uslovia m-0 p-0">
                            <li class="uslovia_1 text-center">{{$item->introtext}}</li>
                            <li class="uslovia_2">
                                <a href="/hydraulics/{{$item->id}}" target="_blank" title="{{$item->introtext}}">
                                    {{$item->description}}
                                </a>
                            </li>
                            {{--<li class="zadacha_image">
                                <img src="{{$item->image?'storage/'.$item->image->path:'/images/coming-soon.jpg'}}" alt="img">
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    {{ $collection->links() }}
@endsection
