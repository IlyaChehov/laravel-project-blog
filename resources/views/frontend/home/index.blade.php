@extends('frontend.layouts.main')

@section('content')
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">
            <div class="blog-custom-build">

                @foreach($posts as $post)
                    <div class="blog-box wow fadeIn">
                        <div class="post-media">
                            <a href="marketing-single.html" title="">
                                <img src="{{ $post->getImage() }}" alt="" class="img-fluid" width="800" height="460">
                                <div class="hovereffect">
                                    <span></span>
                                </div>
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta big-meta text-center">
                            <h4><a href="marketing-single.html" title="">{{ $post->title }}</a></h4>
                            <p>{{ $post->excerpt }}</p>
                            <small><a href="marketing-category.html" title="">{{ $post->category->title }}</a></small>
                            <small><span>{{ $post->getDate() }}</span></small>
                            <small><span><i class="fa fa-eye"></i> {{ $post->views }}</span></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                    <hr class="invis">
                @endforeach

            </div>
        </div>

        <hr class="invis">

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $posts->links('pagination::custom-bootstrap-5') }}
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection