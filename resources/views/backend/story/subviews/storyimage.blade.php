
<div class="callout small">
{!! Form::model($storyImage,[
   'method' => 'put',
   'route' => ['backend.storyimages.update', $storyImage->id],
   'files' => true
]) !!}

<h4>{{$storyImage->image_type}}</h4>

<div class="row">
@if($storyImage->is_active != 0)
   <div class="small-3 column">
      <img class="float-center" src="/imgs/story/thumbnails/{{ 'thumb-' . $storyImage->image_name . '.' .
$storyImage->image_extension . '?'. 'time='. time() }}">
   </div>
   <div class="small-9 column">
@else
   <div class="small-12 column">
@endif
   <div class="input-group">
{!! Form::label('image name', 'Image name:') !!}
{!! Form::text('image_name', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
   </div>
   <!-- form field for file -->
   <div class="input-group">
   {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
   </div>
</div>
   </div>

   <div class="row column">
      <!-- form field for caption -->
      <div class="input-group caption">
      {!! Form::label('caption') !!}
      {!! Form::text('caption', null, ['class' => 'form-control']) !!}
      </div>
      <!-- form field for caption -->
      <div class="input-group teaser">
      {!! Form::label('teaser') !!}
      {!! Form::textarea('teaser', null, ['class' => 'form-control teaser']) !!}
      </div>
   </div>
<div class="row">
   <div class="small-6 columns">
      <!-- form field for moretext -->
      <div class="input-group moretext">
      {!! Form::label('moretext') !!}
      {!! Form::text('moretext', null, ['class' => 'form-control']) !!}
      </div>
   </div>
   <div class="small-6 columns">
      <div class="input-group">
       {!! Form::label('image_type', 'Image Type') !!}
       {!! Form::text('image_type', $storyImage->image_type, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
      </div>
   </div>
</div>



   <div class="input-group">
   {!! Form::submit('Upload Photo', array('class'=>'button')) !!}
   </div>

   {!! Form::close() !!}
</div>
