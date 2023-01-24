@if (session($type))
<div class="alert alert-success">
    {{session($type)}}
</div>
@endif