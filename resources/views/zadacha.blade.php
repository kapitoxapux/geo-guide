@extends('app')

@section('styles')
    <link href="/css/fancybox.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }
        #application {
            justify-content: center;
        }
        .footer {
            max-height: 55px;
        }
        .part_1 {
            min-height: 150px;
        }
        .part_1 .uslovia {
            grid-template-columns: unset;
            width: 100%;
        }
        .part_1 .uslovia .uslovia_1 {
            padding: 1rem;
        }
        .part_1 .uslovia .uslovia_2 {
            padding: 0 1rem 1rem 1rem;
        }
        .zadacha_image img {
            max-width: 100px;
        }
        @media screen and (max-width: 480px)
        {
            .part_1 {
                flex-direction: column;
            }
            .part_1 .uslovia .uslovia_1 {
                text-align: center !important;
            }
            .part_1 .uslovia .uslovia_2 {
                text-align: justify !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="wrapper">
        <div class="part_1 d-flex justify-content-between">
            <ul class="uslovia m-0 p-0">
                <li class="uslovia_1 align-self-center text-left">{{$zadacha->longtitle}}</li>
                <li class="uslovia_2 align-self-center text-left">{!!$zadacha->content!!}</li>
            </ul>
            @if($zadacha->image)
                <span class="zadacha_image align-self-center text-center">
                    <a data-fancybox="gallery" href="{{'/storage/'.$zadacha->image->path}}">
                        <img src="{{'/storage/'.$zadacha->image->path}}" alt="img">
                    </a>
                </span>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

@endsection
