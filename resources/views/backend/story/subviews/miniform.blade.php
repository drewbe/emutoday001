<div class="row">
    <h3>{{ $storyImage->image_type }}</h3>
    <div class="col-md-3">
        <img src="/imgs/story/thumbnails/{{ 'thumb-' . $storyImage->image_name . '.' .
      $storyImage->image_extension . '?'. 'time='. time() }}">
    </div>
    <div class="col-md-7">
        <div class="row">


        <div class="col-xs-4">
            <p>File Name:</p>
        </div>
        <div class="col-xs-8">
            {{ $storyImage->filename }}
        </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <p>Caption:</p>
            </div>
            <div class="col-xs-8">
                {{ $storyImage->caption }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <p>Teaser:</p>
            </div>
            <div class="col-xs-8">
                {{ $storyImage->teaser }}
            </div>

        </div>

    </div>
    <div class="col-xs-1">
        <a href="{{ route('backend.storyimages.edit', $storyImage->id) }}">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
    </div>
    <div class="col-xs-1">
        <a href="{{ route('backend.storyimages.confirm', $storyImage->id) }}">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
    </div>
</div>
