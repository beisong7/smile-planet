
<div class="panel panel-default" style="border-radius: 0">
    <div class="panel-heading" style="background: #2e3436 ;color: #fff">
        TOP ARTICLES
    </div>
    <div class="panel-item">
        @forelse($tops as $blog)
            <a href="{{ route('blog.read', $blog->slug) }}" class="list-group-item" style="border: 0;border-radius: 0">
                <p>{{ $blog->title }}</p>
            </a>
        @empty
            <a href="#" class="list-group-item" style="border: 0;border-radius: 0">
                <p>Loading...</p>
            </a>
        @endforelse
    </div>
</div>
<br>
<div class="panel panel-default" style="border-radius: 0">
    <div class="panel-heading" style="background: #2e3436 ;color: #fff">
        CATEGORIES
    </div>
    <div class="panel-item">
        @forelse($categories as $category)
            <a href="{{ route('blog.category', $category->name) }}" class="list-group-item" style="border: 0;border-radius: 0">
                {{ $category->name }}
            </a>
        @empty
            <a href="#" class="list-group-item" style="border: 0;border-radius: 0">
                <p>Loading...</p>
            </a>
        @endforelse
    </div>
</div>
