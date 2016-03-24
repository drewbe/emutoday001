@extends('layouts.masters')
@section('content')
  <div id="news-story-bar">
       <div class="row">
           <div class="large-12 medium-12 small-12 columns">
               <div id="title-grouping" class="row">
                   <div class="large-5 medium-4 small-6 columns noleftpadding"><h3 class="news-caps">News</h3></div>
                   <div class="large-2 medium-4 small-6 columns noleftpadding"><p class="story-publish-date"><a href="">{{ $story->published_at }}</a></p></div>
                   <div class="large-5 medium-4 hide-for-small columns noleftpadding"><p class="small-return-news"><a href="#">News Home</a></p></div>
               </div>


<div id="story-content" class="row">
    <div class="large-9 medium-8 small-12 columns noleftpadding">
        <div class="addthis"></div>
               <h3>{{ $story->title }}</h3>
            <h5>{{ $story->subtitle }}</h5>
    <div id="big-feature-image">
      <img src="{{$story->getStoryImageByType('imagemain').getMainImagePath()}}" alt="feature-image"></a>

        <div class="feature-image-caption">{{ $story->getStoryImageByType('imagemain')->caption }}</div>
    </div>
    {{ $story->content }}
        <div class="story-author">{{ $story->author()->name }}</div>
        <p class="news-contacts">Contact {{ $story->author()->email }}</p>
        </div>
                <div class="large-3 medium-4 small-12 columns featurepadding">
            <div class="featured-content-block">
                    <h6 class="headline-block lt-green">Featured stories</h6>
                    <a href=""><img src="{{$story->getStoryImageByType('imagesmall').getMainImagePath()}}" alt="story image"></a>
                <ul class="feature-list">
                       <li><a href="">{{ $story->getStoryImageByType('imagesmall')->teaser }}</a></li>
                       <li><a href="">An Ounce of Prevention is Worth a Great Career</a></li>
                       <li><a href="">Eating Healthy at EMU</a></li>

                    </ul>

               </div>


               </div>


            </div>
       </div>

       </div>
       </div>

@endsection

@section('footer')
  @parent
  <div class="row">
      <h5>Footer</h5>
  </div>

  @endsection
