<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Post Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table  table-hover table-bordered ">
       <thead>
            <tr class="table-primary">
                    <td>User Name</td>
                    <td>Email</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td>Action</td>
            </tr>
       </thead>
       <tbody>
            @foreach ($users as $items)
             
                    <tr>
                        <td>{{ $items->name}} </td>
                        <td>{{ $items->email}} </td>
                        <td>
                             
                            <ol>
                                @foreach($items->posts as $post)
                                    <li>{{ $post->image}} </li>
                                @endforeach
                            </ol>
                        </td>
                        <td>
                        <ol>
                            @foreach($items->posts as $post)
                                    <li>{{ \Str::limit($post->description,20)}} </li>
                            @endforeach
                        </ol>
                        
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('post/' . $items->id . '/edit') }}" role="button">Edit</a>
                                | 
                            Delete
                         </td>

                    <tr>
                
            @endforeach
       </tbody>
      </table>
</body>
</html>