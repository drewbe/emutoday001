@extends('layouts.backend')

@section('title', 'Editing '.$story->title)
    @section('headscripts')
        <script src="{{ theme('js/ckeditor/ckeditor.js') }}"></script>
    @stop


@section('content')
    <div class="row">
        <div class="col-md-6">
            {{ csrf_field() }}
            {!! Form::model($story, [
                'method' => $story->exists ? 'put' : 'post',
                'route' => $story->exists ? ['backend.story.update', $story->id] : ['backend.story.store']
                ])
            !!}
            <div class="form-group">
                {!! Form::label('title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('subtitle') !!}
                {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    {!! Form::label('published_at') !!}
                </div>
                <div class="col-md-4">
                    {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group teaser">
                {!! Form::label('teaser') !!}
                {!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit($story->exists ? 'Save Story' : 'Create New Story', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>


        <div class="col-md-6">
            <div id="app">
                <drew list="{{ $story->storyImages }}"></drew>
            </div>
<!--     add image asset -->


            <!-- list all image assets -->

            @each('backend.story.subviews.miniform',$story->storyImages,'storyImage')
        
            </div>
    </div>

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



                $('input[name=published_at]').datetimepicker({
                    allowInputToggle: true,
                    format: 'YYYY-MM-DD HH:mm:ss',
                    showClear: true,
                    defaultDate: '{{ old('published_at', $story->published_at) }}'
                });

                $('input[name=title]').on('blur', function () {
                    var slugElement = $('input[name=slug]');

                    if (slugElement.val()) {
                        return;
                    }

                    slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
                });
                </script>
            @endsection
            @section('footscripts')
                <script src="{{ theme('js/main.js') }}"></script>
            @stop