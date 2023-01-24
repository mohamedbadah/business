<x-dashboard title="blogs">
<div class="content">
<a class="btn sm btn-outline-primary mb-2" href="{{route('admin.blog.create')}}" >create</a>
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
            <th>title</th>
            <th>name</th>
            <th>image</th>
            <th>logo</th>
            <th>description</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->name}}</td>
            <td><img style="border-radius:50%" src="{{asset('storage/'.$blog->image)}}" height="100" width="100"/></td>
            <td><img style="border-radius:50%" src="{{asset('storage/'.$blog->logo)}}" height="100" width="100"/></td>
            <td>{{$blog->description}}</td>
            <td>{{$blog->created_at}}</td>
            <td>
                <a href="{{route('admin.blog.edit',$blog->id)}}" class="btn btn-outline-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('admin.blog.destroy',$blog->id)}}" method="POST">
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