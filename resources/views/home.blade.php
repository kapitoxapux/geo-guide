@extends('layouts.app')

@section('styles')
    <style>
        .collection_rows {
            padding: 0;
        }
        .collection_row {
            list-style-type: none;
            cursor: pointer;
            padding: .5rem;
        }
        .collection_row:hover {
            background-color: tomato;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Панель управления</div>
                    <div class="card-body">
                        <ul class="collection_rows">
                            @foreach($collection as $row)
                                <li class="collection_row d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="{{$row->content}}">
                                    <span class="pr-2 col-2">
                                        {{$row->id}}
                                    </span>
                                    <button type="button" class="btn btn-info col-10 text-left" data-toggle="modal" data-target="#set_image_{{$row->id}}">
                                        {{$row->pagetitle}}
                                    </button>
                                    <div id="set_image_{{$row->id}}" class="modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="POST" action="{{route('image')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$row->id}}">
                                                    <div class="modal-body">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="images" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Загрузить файл</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                        <button type="submit" class="btn btn-primary">Сохранить картинку</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.querySelector('.custom-file-input').addEventListener('change',function(){
            var fileName = this.value;
            document.querySelector('.custom-file-label').textContent=fileName;
        })
    </script>
@endsection
