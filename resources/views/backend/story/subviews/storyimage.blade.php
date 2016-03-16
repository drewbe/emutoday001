<table>
<tr>
    <td>
        {{ $storyImage->id }}
    </td>
    <td>
        <img src="{{ $storyImage->image_path . 'thumbnails/' . 'thumb-' . $storyImage->image_name . '.' .
    $storyImage->image_extension . '?'. 'time='. time() }}">
    </td>
    <td>{{ $storyImage->image_name }}</td>
</tr>
</table>
