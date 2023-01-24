<x-dashboard title="update blog">
    <div class="content">
        <div class="container-fluid">
         <form action="{{route('admin.blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <x-form.input name="title" label="name" :value="$blog->title"/>
            <x-form.input name="name" label="name" :value="$blog->name"/>
              <img src="{{asset('storage/'.$blog->image)}}" height="100px" width="100px"/>
            <x-form.input name="image" label="image" type="file"/>
            <img src="{{asset('storage/'.$blog->logo)}}" height="100px" width="100px"/>
            <x-form.input name="logo" label="logo" type="file"/>
            <x-form.textarea name="description" label="description" :value="$blog->description"/>
            <button type="submit" class="btn btn-primary">save</button>
         </form>
        </div>
      </div>
</x-dashboard>