<x-dashboard title="create service">
    <div class="content">
        <div class="container-fluid">
         <form action="{{route('admin.section.update',$section->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <x-form.input name="title" label="title" :value="$section->title"/>
            <x-form.input name="url_video" label="url_video" type="url" :value="$section->url_video"/>

            <x-form.input name="image" label="image" type="file"/>
            <x-form.textarea name="description" label="description" :value="$section->description"/>
            <button type="submit" class="btn btn-primary">save</button>
         </form>
        </div>
      </div>
</x-dashboard>