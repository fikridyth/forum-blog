@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By. <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                <article class="my-3 fs-6">
                    {!! $post->body !!}
                </article>

                {{-- <a href="/posts" class="d-block mt-2 text-decoration-none">Back to Post</a> --}}

                {{-- Komentar --}}
                <div class="btn-group">
                    <button class="btn btn-light"><span class="lnr lnr-thumbs-up"></span> Like</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-light" id="btn-main-comment"><span class="lnr lnr-bubble"></span>
                        Comment</button>
                </div>

                <form method="POST" action="" style="margin-top:10px; display:none;" id="main-comment">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="0">
                    <textarea name="content" class="form-control" id="comment-main" rows="4"></textarea>
                    <input type="submit" style="margin-top:5px;" class="btn btn-success form-control" value="Kirim">
                </form>

                <hr>

                <h3 style="margin-top:10px;">Comments</h3>
                <ul class="list-unstyled activity-list">
                    @foreach ($post->comment()->where('parent_id', 0)->orderBy('created_at', 'desc')->get() as $comment)
                        <li>
                            <p style="padding-left: 0.2em;">
                                <a href="#" class="text-decoration-none">{{ $comment->user->name }}</a> <small
                                    class="text-muted">{{ $comment->created_at->diffForHumans() }}</small><br>
                                {{ $comment->content }}
                            </p>

                            <div class="btn-group" style="margin-bottom:10px; margin-top:-10px;">
                                <button class="btn btn-white"><span class="lnr lnr-thumbs-up"></span></button>
                                <button class="btn btn-white" id="btn-sub-comment"><span
                                        class="lnr lnr-bubble"></span></button>
                            </div>


                            <form action="" method="POST" style="margin-bottom:-10px;" id="sub-comment">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <input type="text" style="margin-top:-6px;" name="content" class="form-control">
                                <input type="submit" style="margin-top:3px;" class="btn btn-success" value="Send Reply">
                            </form>
                            <div style="margin-top: 20px;" />

                            @php $showReply = false @endphp
                            @foreach ($comment->childs as $child)
                                <div style="padding-left: 1.8em; margin-bottom: 10px;">
                                    @if (!$showReply)
                                        <h5 style="padding-left: 1em;">Reply</h5>
                                        @php $showReply = true @endphp
                                    @endif
                                    <a href="#" class="text-decoration-none">{{ $child->user->name }}</a>
                                    <small class="text-muted">{{ $child->created_at->diffForHumans() }}</small> <br>
                                    {{ $child->content }}
                                </div>
                            @endforeach
                            <hr style="margin-top: 5px;">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $('#btn-main-comment').click(function() {
                $('#main-comment').toggle('slide');
            });
        });

        // $(document).ready(function() {
        //     $('#btn-sub-comment').click(function() {
        //         $('#sub-comment').toggle('slide');
        //     });
        // });
    </script>
@endsection
