<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <form action="{{ route('post.update',$users->id) }}" method="POST">
        @csrf  <!-- CSRF token for security -->
        @method('PUT')
       
    
       

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $users->name }}" required>
             <!-- Display error message for name -->
             @error('name')
             <div style="color: red;">{{ $message }}</div>
         @enderror
        </div>
    
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $users->email }}" required>
             <!-- Display error message for name -->
             @error('name')
                <div style="color: red;">{{ $message }}</div>
             @enderror
        </div>
    
        <div class="col-12 mb-3">
            <button class="btn btn-primary " type="submit">Submit form</button>
          </div>

        <table class="table  table-hover table-bordered ">
            <thead>
                 <tr class="table-primary">
                       
                         <td>Image</td>
                         <td>Description</td>
                         <td>Action</td>
                 </tr>
            </thead>
            <tbody>
                 @foreach ($users->posts as $items)
                  
                         <tr>
                             
                                   {{-- {{ $items->image}}  --}}
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/post/').$items->image }}" class="rounded" style="width: 150px">
                                    {{-- 8ff71c09866f415adb8417debe2c7628.jpeg --}}
                                    {{-- <img src="{{ Storage::url('public/post/8ff71c09866f415adb8417debe2c7628.jpeg') }}" class="rounded" style="width: 150px">  --}}
                                </td>
                          
                             <td>{{ \Str::limit($items->description,30) }} </td>
                            
                             <td>
                                 <a class="btn btn-primary" href="{{ url('post/editpost/' . $items->id)}}" role="button">Edit</a>
                                 {{-- /post/editpost/{id}/user/{id} --}}
                                 Edit  
                                   | 
                                 Delete
                              </td>
     
                         <tr>
                     
                 @endforeach
            </tbody>
           </table>
    </form>
</body>
</html>