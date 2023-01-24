<x-dashboard title="create service">
    <div class="content">
        <div class="container-fluid">
         <form action="{{route('admin.section.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" label="title"/>
            <x-form.input name="url_video" label="url_video" type="url"/>
            <x-form.input name="image" label="image" type="file"/>
            <x-form.textarea name="description" label="description"/>
            <button type="submit" class="btn btn-primary">save</button>
         </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
</x-dashboard>