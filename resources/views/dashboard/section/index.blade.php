<x-dashboard title="services">
<div class="content">
<a class="btn sm btn-outline-primary mb-2" href="{{route('admin.section.create')}}" >create</a>
<div class="container-fluid">
<x-alert type="success"/>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>image</th>
            <th>URL</th>
            <th>description</th>
            <th>created_at</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sections as $section)
        <tr>
            <td>{{$section->id}}</td>
            <td>{{$section->title}}</td>
            <td><img style="border-radius:50%" src="{{asset('storage/'.$section->image)}}" height="100" width="100"/></td>
            <td>{{substr($section->url_video,0,12)}}</td>
            <td>{{$section->description}}</td>
            <td>{{$section->created_at}}</td>
            <td>
                <a href="{{route('admin.section.edit',$section->id)}}" class="btn btn-outline-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('admin.section.destroy',$section->id)}}" method="POST">
                 @csrf
                 @method("delete")
                 <button type="submit" onclick="return confirm('are you sure deleted')" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</x-dashboard>