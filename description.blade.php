  @extends('header')
  @section('body')
<div class="container">
  <h2 class="text-center">@lang('home.hello'). {{Auth::user()->name}}</h2>
   @foreach($desc as $post)
  <div class="card">

    <div class="card-header text-center">{{$post->title}}</div>
    <div class="card-body text-center">{{$post->description}}</div> 
    <div class="card-footer">
      <div class="col-sm-8">
        <span id="{{$post->id}}">{{$post->liked}}</span>
        <button class="btn-dark" onclick="like(this,'{{$post->id}}','1')">@lang('home.like')</button>
        <span class="{{$post->id}}">{{$post->dislike}}</span>
        <button class="btn-dark" onclick="like(this,'{{$post->id}}','2')">@lang('home.unlike')</button>
        <span id="com+{{$post->id}}">{{$post->comment}}</span>
        <button class="btn-success com" onclick="comment(this,'{{$post->id}}')">@lang('home.comment')</button>
        <label style="display: none;">
          <textarea style="resize: none;position: relative;top: 20px;"></textarea><button class="btn-info" onclick="post(this,'{{$post->id}}')">@lang('home.post')</button>
        </label>
        <button class="btn-primary" onclick="viewcomment(this,'{{$post->id}}')">@lang('home.view_comment')</button>
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="col-sm-5 card-header viewcomment" style="display: none;border: 1px solid #808080;"></div>
  </div>
  @endforeach
</div>
<input type="hidden" id="_token" value="{{ csrf_token() }}">
@endsection
