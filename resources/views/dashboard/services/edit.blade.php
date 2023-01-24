<x-dashboard title="create service">
    <div class="content">
        <div class="container-fluid">
         <form action="{{route('admin.service.update',$service->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <x-form.input name="name" label="name" :value="$service->name"/>
            <x-form.input name="image" label="image" type="file"/>
            <x-form.textarea name="description" label="description" :value="$service->description"/>
            <button type="submit" class="btn btn-primary">save</button>
         </form>
        </div>
      </div>
</x-dashboard>