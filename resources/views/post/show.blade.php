@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $formatData }}
                • {{ $post->comments->count() }} комментариев</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                        <section class="py-2">
                            <form action="{{ route('post.like.store', $post) }}" method="post">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                    @auth()
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    @endauth
                                </button>
                            </form>
                        </section>
                    </div>
                </div>
                {{--                <div class="row mb-5">--}}
                {{--                    <div class="col-md-4 mb-3" data-aos="fade-right">--}}
                {{--                        <img src="assets/images/blog_post_1.jpg" alt="blog post" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-4 mb-3" data-aos="fade-up">--}}
                {{--                        <img src="assets/images/blog_post_2.jpg" alt="blog post" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-4 mb-3" data-aos="fade-left">--}}
                {{--                        <img src="assets/images/blog_post_3.jpg" alt="blog post" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_image) }}"
                                         alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost) }}" class="blog-post-permalink"
                                       style="text-decoration: none;">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list mb-5 card-footer">
                        <h2 class="comment-list mb-5" data-aos="fade-up">Comments({{ $comments->count() }})</h2>
                        @foreach($comments as $comment)
                            <div class="comment-text mb-3">
                                <span class="username">
                                    <div class="font-weight-bold">
                                      {{ $comment->user->name }}
                                    </div>
                                    <span class="text-muted float-right">
                                        {{ $comment->DateAsCarbon->diffForHumans()}}
                                    </span>
                                </span>
                                {{ $comment->message }}
                            </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Comment, please</h2>
                        {{--                        <form action=" {{ route('personal.comment.store') }}" method="post">--}}
                        <form action=" {{ route('post.comment.store', $post) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Write comment"
                                              rows="10"></textarea>
                                </div>
                                {{--                                <input type="hidden" name="post_id" value="{{ $post->id }}">--}}
                                {{--                                <input type="hidden" name="user_id"--}}
                                {{--                                       value="{{ (auth()->user()) ? auth()->user()->id : ''}}">--}}

                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
