@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div style="display: flex; justify-content: space-between" class="panel-heading">
            <h2>Товар</h2>  
            <a href="/product/create" class="btn btn-primary"> + Добавить новый</a>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Обложка</th>
                    <th>Название</th>
                    <th>Изображения</th>
                    <th>Стоимость</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Размер</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $item)
                    <tr>
                        <td> <img width="100" src="{{$item->cover}}" style="margin:10px"></td>
                        <td>{{ $item->title }}</td>
                        <td>
                        @foreach($item->photoes as $photo)
                      <img width="100" src="{{$photo->path}}" style="margin:10px">
                        @endforeach
                        </td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->descr}}</td>
                        <td>{{$item->category->title}}</td>
                        <td>{{$item->size}}</td>
                        <td style="text-align:right;">
                            <a href="/product/{{ $item->id }}/edit" class="btn btn-primary">Редактировать</a>
                            <a href="/product/{{ $item->id }}/destroy" class="btn btn-danger">Удалить</a>
                        </td>
                       
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
    table {
        width: 90%;
        margin-top: 20px;
    }
    table, th, td {
      border: 1px solid grey !important;
    }
    thead {
      position: sticky;
      top: 0;
      background: #2B2F33;
      color: white;
      border-color:white;
    }
    .wrap {
      margin: 0 !important;
      padding: 0 !important;
    }
    main {
        width: 100%;
        display:flex;
        flex-direction: column;
        align-items:center;
    }
    .panel {
        width: 95%;
    }
  </style>