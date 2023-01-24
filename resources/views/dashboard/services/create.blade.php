<x-dashboard title="create service">
    <div class="content">
        <div class="container-fluid">
         <form action="{{route('admin.service.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" label="name"/>
            {{-- <x-form.input name="image" label="image" type="file"/> --}}
            <x-form.input name="image" label="image" type="file"/>
            <x-form.textarea name="description" label="description"/>
            <button type="submit" class="btn btn-primary">save</button>
         </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
</x-dashboard>