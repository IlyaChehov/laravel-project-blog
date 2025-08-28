<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Популярные посты</h2>
        <div class="blog-list-widget">
            <div class="list-group">

                @foreach($popularPosts as $popularPost)
                    <a href="{{ route('home.show', $popularPost) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{ $popularPost->getImage() }}" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{ $popularPost->title }}</h5>
                            <small>{{$popularPost->getDate('d M, y')}}</small>
                        </div>
                    </a>
                @endforeach

            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Категории</h2>
        <div class="link-widget">
            <ul>
                @foreach($categories as $category)
                <li><a href="{{ route('home.category', $category) }}">{{ $category->title }}<span>({{ $category->posts_count }})</span></a></li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div>