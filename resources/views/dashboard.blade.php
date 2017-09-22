@extends('layout.master')
@section('title')
What's In Your Mind?
@stop
@section('content')
<div class="row">
@include('include.message-block')
</div>
    <section class="row new-post">
        <div class="col-md-9 col-md-offset-2">

            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="What's In Your Mind?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" >Update Status</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

    <section class="row posts">
          <div class="col-md-9 col-md-offset-2">
              <header><h3>What other people say...</h3></header>
              <ul class="list-group">
                  @foreach($posts as $post)
                  <li href="#" class="list-group-item">
                        <article class="post">
                          <div class="row">
                                    <div class="col-xs-3 col-md-3"><img src="{{ route('account.image', ['filename' => $post->user->name . '-' . $post->user->id . '.jpg']) }}" alt="" class="img-responsive" ></div>
                                    <div class="col-xs-9 col-md-9">
                                      <div class="info">
                                           <b> <a href="{{ route('Userprofile', ['username' => $post->user->username, 'id' => $post->user->id])}}">{{ $post->user->name }}</a> </b> on {{ $newDateTime = date('d-M-y - h:i A', strtotime($post->created_at)) }}
                                      </div>
                                      <div class="interaction">
                                          @if(Auth::user() == $post->user)
                                            <a href="{{ route('post.delete', ['post_id' => $post -> id])}}">Delete Post</a>
                                          @endif
                                      </div><br>
                                    <div>
                                      <p>{!! $post->body !!}</p>

                                      <!--- Yaha Comment show ka form code --->
                                      @foreach($comments as $comment)
                                      @if( $comment->post_id == $post->id)
                                      <table class="table table-striped" style="width:100%;text-align:left;background-color:#F6F7F9;">
                                        <thead>
                                          <tr>
                                            <th>{!! $comment->body !!}</th>
                                          </tr>
                                        </thead>
                                     </table>
                                      <p></p>
                                      @endif
                                      @endforeach
                                      <!--- Yaha Comment form ka form code --->
                                      <form action="{{ route('comment.create', ['post_id' => $post -> id, 'id' => $post->user->id]) }}" method="post">
                                          <div class="form-group">
                                              <input class="form-control" name="body" id="new-post" rows="5" placeholder="Comment In Mind?"></input>
                                          </div>
                                          <button type="submit" class="btn btn-primary" >Submit Comment</button>
                                          <input type="hidden" value="{{ Session::token() }}" name="_token">
                                      </form>

                                    </div>
                                  </div>
                          </article>
                        <br>
                      </li>
                  @endforeach
                  {{ $posts->links() }}

                </ul>
          </div>
    </section>
@endsection
