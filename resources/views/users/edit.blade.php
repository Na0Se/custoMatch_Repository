@extends('layouts.layout')

@section('content')
<div class="signupPage">
  <header class="header">
    <div>プロフィールを編集</div>
  </header>

    <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
    @csrf

    @error('email')
    <span class="errorMessage">
        {{ $message }}
    </span>
    @enderror

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
  
    　 </div>
      <div class="form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
      </div>
      <div class="form-group">
        <div><label>タイプ</label></div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="sex" value="Clerk" type="radio" id="inlineRadio1" @if($user->sex === 'Clerk') checked @endif>
          <label class="form-check-label" for="inlineRadio1">接客者</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" name="sex" value="Customer" type="radio" id="inlineRadio2" @if($user->sex === 'Customer') checked @endif>
          <label class="form-check-label" for="inlineRadio2">お客様</label>
        </div>
      </div>
      <div class="form-group">
        <label>自己紹介文</label>
        <textarea class="form-control" name="self_introduction" rows="10">{{$user->self_introduction}}
        </textarea>
      </div>  

      @if (Auth::user()->isClerk())
      <div class="form-group">
        <label>アピール内容</label>
        <textarea class="form-control" name="introduction" rows="10">{{$user->introduction}}
        </textarea>
      </div>  
      @endif
    


      <div class="text-center">
      <button type="submit" class="btn submitBtn">変更する</button>
      </div>
    </form>
  </div>
</div>
@endsection

