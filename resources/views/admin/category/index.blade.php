<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        
        ALL Ctegories
        </h2>
    </x-slot>

    <div class="py-12">

     <div class="container">
     <div class="row">
     <div class="col-md-8">
     <div class="card">
          <div class="card-header">All Category</div>
     
     
     <table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Create At</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
   
    <tr>
      <th scope="row"></th>
      <td>{{ $category->category_name }}</td>
      <td>{{ $category->user_id }}</td>
      <td>{{ $category->created_at }}</td>
    </tr>
    @endforeach

  </tbody>
</table>
     </div>
    </div>

    <div class="col-md-4">
     <div class="card">
          <div class="card-header">Add Category</div>
          <div class="card-body">
          <form action="{{ route('store.category') }}" method="POST">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" >
        
        @error('category_name')
             <span class="text-danger">  {{ $message }}</span>
        @enderror
    
    </div>
  
  </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
        </div>   
     </div>
       </div>
     
     </div>
     </div>
       </div>
     
</x-app-layout>
