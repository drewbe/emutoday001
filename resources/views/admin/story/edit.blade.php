@inject('storytypes', 'emutoday\Http\Utilities\StoryTypes')
@extends('admin.layouts.master')

@section('title', 'Editing '.$story->title)
    @section('scripthead')
        @parent
      <script src="{{ theme('js/ckeditor/ckeditor.js') }}"></script>
  @endsection
@section('content')
    <div class="row">
        <div class="medium-6 columns">
            <div class="row column">
                {{ csrf_field() }}
                {!! Form::model($story, [
                'method' => $story->exists ? 'put' : 'post',
                'route' => $story->exists ? ['admin.story.update', $story->id] : ['admin.story.store']
                    ])
                    !!}
                <div class="input-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="input-group">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                </div>
                <div class="input-group">
                    {!! Form::label('subtitle') !!}
                    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="input-group row">
                <div class="small-2 columns">
                    {!! Form::label('published_at') !!}
                </div>
                <div class="small-10 columns">
                    {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row column">


            <div class="input-group teaser">
                {!! Form::label('teaser') !!}
                {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
            </div>
            <div class="input-group">
                {!! Form::label('content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="input-group">
                {!! Form::label('story_type','Story Type') !!}
                {!! Form::text('story_type', $story->story_type, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
            {!! Form::submit($story->exists ? 'Save Story' : 'Create New Story', ['class' => 'button']) !!}

            {!! Form::close() !!}
                </div>
        </div>


        <div class="medium-6 columns">

            <!--     add image asset -->
            @each('admin.story.subviews.storyimage', $story->storyImages, 'storyImage')
            <!-- list all image assets -->


            </div>
    </div>
@endsection
@section('footer')
    @parent
    <script>

                            CKEDITOR.replace('teaser',
                            {
                                toolbarGroups: [
                                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                                    { name: 'links', groups: [ 'links' ] },
                                    { name: 'insert', groups: [ 'insert' ] },
                                    { name: 'forms', groups: [ 'forms' ] },
                                    { name: 'tools', groups: [ 'tools' ] },
                                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                                    { name: 'others', groups: [ 'others' ] },
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                                    { name: 'styles', groups: [ 'styles' ] },
                                    { name: 'colors', groups: [ 'colors' ] },
                                    { name: 'about', groups: [ 'about' ] }
                                ],
                                removeButtons: 'Underline,Subscript,Superscript,Cut,Undo,Redo,Copy,Paste,PasteText,PasteFromWord,Scayt,Link,Unlink,Anchor,Image,Table,SpecialChar,Maximize,Source,NumberedList,BulletedList,Indent,Outdent,Blockquote,About',
                                height : 50,
                                toolbar : 'simple'
                            })
                            CKEDITOR.replace('content');




                            $('input[name=title]').on('blur', function () {
                                var slugElement = $('input[name=slug]');

                                if (slugElement.val()) {
                                    return;
                                }

                                slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
                            });
                </script>
                <!-- add additional script to bottom of body like js/main.js
                or add Jquery or similiar calls from inside script tags
                //$('#flash-overlay-modal').foundation('open'); //will open a Reveal modal with id `reveal`.
@endsection
