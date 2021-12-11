@extends('layouts.layout')

@section('content')
<div class="topPage">
   <nav class="nav">
    <ul>
      <li class="personIcon">
        <a href="/users/show/{{Auth::id()}}"><i class="fas fa-user fa-2x"></i></a></li>
      <li class="appIcon"><a href="{{route('home')}}"><img src="custoMatch/storage/app/public/images/custoMatch_logo.png"></a></li>
    </ul>
   </nav>
  {{--<div class="container">
            <form action="{{ route('search.index') }}" method="GET">
                <div class="d-flex">
                <input type="text" name="q" class="form-control" style="width: 500px" placeholder="入力して下さい" value="{{$keyword}}" required autofocus>
                <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
        <br>
        <br>
  </div>--}}
  
  <div class="container">
    @foreach($users as $user)
    @if ($user->isClerk())
      <div class="card">
        <div class="card-header">
        {{--@if ($user->user->base64Image)
        <img src="{{ $user->user->base64Image }}" alt="{{ $post->user->name }}" class="img-thumbnail" style="width: 100px" >
        @endif--}}
            {{ $user->name }}
            <a href="#" class="like"><i class="fas fa-heart fa-2x"></i></a>
        </div>
        <div class="card-body">
            　<p class="card-text font-weight-bold">{{ $user->self_introduction }}</p>
            　<p class="card-text">{{ $user->introduction }}</p>
        </div>
      </div>
      <br>
    @endif
    @endforeach
  </div>

  <div class="container">
      <div class="col-sm-8" style="text-align:right;">
          <div class="paginate">
          {{ $users->appends(Request::only('q'))->links() }}
          </div>
      </div>
  </div>
  
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')

@foreach($users as $user) 
    {{$user->name}}<br>
@endforeach

@endsection --}}

