

{!! Form::model($storyImage,[
   'method' => 'put',
   'route' => $storyImage->exists ? ['backend.storyimages.update', $storyImage->id] : ['backend.storyimages.store'],
   'files' => true
]) !!}

<!-- image name Form Input -->
<div class="form-group">
{!! Form::label('image name', 'Image name:') !!}
{!! Form::text('image_name', null, ['class' => 'form-control']) !!}
</div>

@if ($storyImage->exists)
 <div>{{ $storyImage->filename }} <br>
    {{ $storyImage->image_name }} - thumbnail :  <br>
    <img src="/imgs/story/thumbnails/{{ 'thumb-' . $storyImage->image_name . '.' .
  $storyImage->image_extension . '?'. 'time='. time() }}">
</div>
 <div>
    {{ $storyImage->image_name }} :  <br>
    <img src="/imgs/story/{{ $storyImage->image_name . '.' .
        $storyImage->image_extension . '?'. 'time='. time() }}">
 </div>
 <!-- form field for file -->
 <div class="form-group">
 {!! Form::label('image', 'Primary Image') !!}
 {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
 </div>
@else
<!-- form field for file -->
<div class="form-group">
{!! Form::label('image', 'Primary Image') !!}
{!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
</div>
@endif

<!-- form field for caption -->
<div class="form-group caption">
{!! Form::label('caption') !!}
{!! Form::textarea('caption', null, ['class' => 'form-control']) !!}
</div>

<!-- form field for caption -->
<div class="form-group teaser">
{!! Form::label('teaser') !!}
{!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
</div>
<!-- form field for moretext -->
<div class="form-group moretext">
{!! Form::label('moretext') !!}
{!! Form::textarea('moretext', null, ['class' => 'form-control']) !!}
</div>
<!-- form field for moretext -->
<div class="form-group">
 {!! Form::label('image_type', 'Image Type') !!}
 {!! Form::select('image_type', $storyImage->image_type, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<div class="form-group">
{!! Form::submit('Upload Photo', array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
