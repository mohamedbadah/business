<x-dashboard title="services">
<div class="content">
<a class="btn sm btn-outline-primary mb-2" href="{{route('admin.service.create')}}" >create</a>
<div class="container-fluid">
<x-alert type="success"/>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>image</th>
            <th>description</th>
            <th>created_at</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
        <tr>
            <td>{{$service->id}}</td>
            <td>{{$service->name}}</td>
            <td><img style="border-radius:50%" src="{{asset('storage/'.$service->image)}}" height="100" width="100"/></td>
            <td>{{$service->description}}</td>
            <td>{{$service->created_at}}</td>
            <td>
                <a href="{{route('admin.service.edit',$service->id)}}" class="btn btn-outline-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('admin.service.destroy',$service->id)}}" method="POST">
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