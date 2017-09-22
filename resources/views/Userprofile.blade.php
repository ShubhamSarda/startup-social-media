@extends('layout.master')
@section('title')
Profile - {{$username}}
@stop
@section('content')
<div class="row">
@include('include.message-block')
</div>
    <section class="row new-post">
        <div class="col-md-9 col-md-offset-2">

            <header><h3>What do you have to say {{$username}} ?</h3></header>
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
              <header><h3>Your Status Updates!</h3></header>
              <ul class="list-group">

                  @foreach($posts as $post)
                  @if( $post->user_id == $id)
                  <li href="#" class="list-group-item">
                        <article class="post">
                          <div class="row">
                                    <div class="col-xs-4 col-md-3"><img src="{{ route('account.image', ['filename' => $post->user->name . '-' . $post->user->id . '.jpg']) }}" alt="" class="img-responsive" ></div>
                                    <div class="col-xs-8 col-md-9">
                                      <div class="info">
                                           <b> {{ $post->user->name }} </b> on {{ $newDateTime = date('d-M-y - h:i A', strtotime($post->created_at)) }}
                                      </div>
                                      <div class="interaction">
                                          @if(Auth::user() == $post->user)
                                            <a href="{{ route('post.delete', ['post_id' => $post -> id])}}">Delete Post</a>
                                          @endif
                                      </div><br>
                                    <div>
                                      <p>{!! $post->body !!}</p>
                                    </div>
                                  </div>
                          </article>
                        <br>
                      </li>
                      @endif
                    @endforeach

                </ul>
          </div>
    </section>
@endsection
