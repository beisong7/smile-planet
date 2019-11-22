@forelse($blogs as $blog)
    <div class="col-md-6 col-xs-12" style="margin-bottom: 20px;">
        <div class="panel panel-default no-padding no-margin shadow-l1">
            <div class="panel-body box no-margin no-padding img-center">
                <div class="contents">
                    <img class="img-sit" src="{{ $blog->banner() }}" alt="">
                </div>
            </div>
            <div class="panel-footer">
                <div class="row" style="padding: 0 5px">
                    <div style="height: 100px; overflow: hidden;margin-bottom: 4px;">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->desc }}</p>
                    </div>

                    <p>
                        <a href="{{ route('blog.read', $blog->slug) }}" class=" btn btn-xs btn-dark">Read</a>

                        <small class="purple2">
                            <i class="pull-right">Published <b>{{ date('F d, Y', strtotime($blog->updated_at)) }}</b></i>
                        </small>
                    </p>

                </div>
            </div>
        </div>
    </div>
@empty
    <hr>
    <h1 class="text-center">L O A D I N G</h1>
    <h4 class="text-center">The blog is being loaded. Please wait. . . or  check back later</h4>
@endforelse