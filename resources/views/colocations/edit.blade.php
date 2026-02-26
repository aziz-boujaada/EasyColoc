<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('colocation.update' , $colocation)}}" method="post">
        @csrf 
        @method('PUT')
      <label for="name">coloc name </label><br>
      <input type="text" name="name" value="{{$colocation->name}}">
       
      <button type="submit">update</button>

    </form>
</body>
</html>