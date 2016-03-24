@if($errors->any())
<div class="callout alert">
<strong>We found some errors!</strong>
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
