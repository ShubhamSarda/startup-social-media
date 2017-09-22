@if(count($errors)>0)
    <ul>
      @foreach($errors->all() as $error)
        <li class="bg-warning">{{$error}}</li>
      @endforeach
    </ul>
@endif
@if(Session::has('message'))
<ul>
    <li class="bg-warning">{{Session::get('message')}}</li>
</ul>
@endif
