@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title text-left" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta text-right" data-aos="fade-up" data-aos-delay="200">{{ $date->year }}
                г. {{ $date->translatedFormat('F') }}, {{ $date->day }} <br> {{ $date->format('H:i') }} <br>
                Комментариев: {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->preview_image)  }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{ asset('storage/' . $post->main_image)  }}" alt="blog post" class="img-fluid">
                    </div>
                </div>
            </section>
            <section class="py-5">
                @auth()
                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                        @csrf
                        <span>{{ $post->liked_users_count }}</span>
                        <button type="submit" class="bg-transparent border-0 ">
                            <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                        </button>
                    </form>
                @endauth
                @guest()
                    <div>
                        <span>{{ $post->liked_users_count }}</span>
                        <i class="far fa-heart"></i>
                    </div>
                @endguest
            </section>
            <section class="comment-list mb-6"><h3>Комментарии: {{ $post->comments->count() }} </h3>
                @foreach($post->comments as $comment)
                    <div class="comment-text mb-3">
                    <span class="username">
                        <div class="">
                        <h5>{{ $comment->user->name }}</h5>
                        </div>
                      <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                    </span>
                    {{ $comment->message }}

                @endforeach
            </section>@auth()
                <section class="comment-section">
                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Ваш комментарий"
                                          rows="10"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            @endauth
            @if($relatedPosts->count() > 0)
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <a href="{{ route('post.show', $relatedPost->id) }}" class="col-md-4"
                                       data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->preview_image)  }}"
                                             alt="related post" class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
