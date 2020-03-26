<div id="fh5co-blog">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Recent Post</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">

            @foreach($posts as $post)

                <div class="col-lg-4 col-md-4">
                <div class="fh5co-blog animate-box">
                    <a href="{{ route('article', $post->uri) }}">
                        <img class="img-responsive" src="{{ \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 800, 450)) }}" alt="">
                    </a>
                    <div class="blog-text">
                        <h3><a href="{{ route('article', $post->uri) }}">{{ $post->title }}</a></h3>
                        <span class="posted_on">{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</span>
                        <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                        <p>{{ $post->subtitle }}</p>
                        <a href="{{ route('article', $post->uri) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
