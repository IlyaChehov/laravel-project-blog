@extends('admin.layouts.main')
@section('title', 'Создание поста')
@section('content')
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Создание поста</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item">Создание поста</li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="card card-warning card-outline mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Заголовок поста</label>
                                        <input value="{{ old('title') }}" name="title" type="text"
                                               class="form-control @error('title') is-invalid @enderror" id="title"
                                               aria-describedby="Название">
                                        @error('title')
                                        <div id="title" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Краткое описание</label>
                                        <textarea name="excerpt" id="excerpt"
                                                  class="form-control @error('excerpt') is-invalid @enderror"
                                                  aria-label="With textarea">{{ old('excerpt') }}</textarea>
                                        @error('excerpt')
                                        <div id="excerpt" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="meta_desc" class="form-label">SEO описание</label>
                                        <textarea name="meta_desc" id="meta_desc"
                                                  class="form-control @error('meta_desc') is-invalid @enderror"
                                                  aria-label="With textarea">{{ old('meta_desc') }}</textarea>
                                        @error('meta_desc')
                                        <div id="meta_desc" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Контент поста</label>
                                        <textarea name="content" id="content"
                                                  class="form-control ckeditor @error('content') is-invalid @enderror"
                                                  aria-label="With textarea">{{ old('content') }}</textarea>
                                        @error('content')
                                        <div id="content" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-warning card-outline mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Категория</label>
                                        <select name="category_id"
                                                class="form-select @error('category_id') is-invalid @enderror"
                                                id="category_id">
                                            @foreach($categories as $category)
                                                <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div id="category_id" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Создать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Назад</a>
    </div>
@endsection