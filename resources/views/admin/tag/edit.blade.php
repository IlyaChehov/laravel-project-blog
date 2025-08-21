@extends('admin.layouts.main')
@section('title', 'Изменение тега')
@section('content')
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Изменение тега</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item">Изменение тега</li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-warning card-outline mb-4">
                    <form method="post" action="{{ route('admin.tag.update', $tag) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Название</label>
                                <input value="{{ old('title') ?? $tag->title }}" name="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror" id="title"
                                       aria-describedby="Название" placeholder="Название категории">
                                @error('title')
                                <div id="title" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meta_desc" class="form-label">SEO категории</label>
                                <textarea name="meta_desc" id="meta_desc"
                                          class="form-control @error('meta_desc') is-invalid @enderror"
                                          aria-label="With textarea" placeholder="SEO категории">{{ old('meta_desc') ?? $tag->meta_desc }}</textarea>
                                @error('meta_desc')
                                <div id="meta_desc" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Назад</a>
    </div>
@endsection