@extends('frontend.layouts.category')

@section('content')
    <div class="page-wrapper">
        <div class="blog-custom-build">

            @forelse($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('home.show', $post) }}" title="{{ $post->title }}">
                            <img src="{{ $post->getImage() }}" alt="{{ $post->title }}" class="img-fluid" width="800"
                                 height="460">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <h4><a href="{{ route('home.show', $post) }}" title="">{{ $post->title }}</a></h4>
                        <p>{{ $post->excerpt }}</p>
                        <small><a href="{{ route('home.category', $post->category) }}"
                                  title="">{{ $post->category->title }}</a></small>
                        <small><span>{{ $post->getDate('d F, Y') }}</span></small>
                        <small><span><i class="fa fa-eye"></i> {{ $post->views }}</span></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
                <hr class="invis">
            @empty
                <div class="blog-box wow fadeIn">
                    <h3> Список постов пока пуст =(</h3>
                </div>
            @endforelse

        </div>
    </div>

    <hr class="invis">

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $posts->links('pagination::custom-bootstrap-5') }}
            </div><!-- end col -->
        </div><!-- end row -->
@endsection