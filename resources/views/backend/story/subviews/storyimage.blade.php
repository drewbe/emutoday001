
{!! Form::model($storyImage,[
   'method' => 'put',
   'route' => ['backend.storyimages.update', $storyImage->id],
   'files' => true
]) !!}

<h3>{{$storyImage->image_type}}</h3>
   <div class="form-group">
   {!! Form::label('image name', 'Image name:') !!}
   {!! Form::text('image_name', null, ['class' => 'form-control']) !!}
   </div>
@if($storyImage->is_active != 0)
   <img src="/imgs/story/thumbnails/{{ 'thumb-' . $storyImage->image_name . '.' .
$storyImage->image_extension . '?'. 'time='. time() }}">

@endif

   <!-- form field for file -->
   <div class="form-group">
   {!! Form::label('image', 'Primary Image') !!}
   {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
   </div>
   <!-- form field for caption -->
   <div class="form-group caption">
   {!! Form::label('caption') !!}
   {!! Form::text('caption', null, ['class' => 'form-control']) !!}
   </div>

   <!-- form field for caption -->
   <div class="form-group teaser">
   {!! Form::label('teaser') !!}
   {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
   </div>
   <!-- form field for moretext -->
   <div class="form-group moretext">
   {!! Form::label('moretext') !!}
   {!! Form::text('moretext', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('image_type', 'Image Type') !!}
    {!! Form::text('image_type', $storyImage->image_type, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
   {!! Form::submit('Upload Photo', array('class'=>'btn btn-primary')) !!}
   </div>

   {!! Form::close() !!}
