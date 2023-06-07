@extends('layouts.app')
@section('content')

<script src="https://cdn.tiny.cloud/1/b7wcs9ngmi9gl6v19rjlj6oqdxcyp327pmshcv13won23un5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">{{ __('Создание нового Товара') }}</div>

            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Наименование') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Описание') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="descr"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Стоимость') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Обложка') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" id="cover" name="cover">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Изображения') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" id="img" name="file[]" multiple>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label  class="col-md-4 col-form-label text-md-end">{{ __('Категория') }}</label>

                        <div class="col-md-6">
                        <select class="form-control" id="sq" name="category_id">
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Размер') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="size" required autofocus>
                        </div>
                    </div>
                   
                    
                    

                   
                    <div class="col-md-4 ">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Вперёд') }}
                            </button>
                        </div>
                    </div>


            </div>


            </form>
        </div>
    </div>
</div>
</div>
<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ]
    });
</script>

@endsection