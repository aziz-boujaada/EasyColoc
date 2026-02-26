<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('colocation.store')}}" method="post">
        @csrf 
      <label for="name">coloc name </label><br>
      <input type="text" name="name" placeholder="colocation name">
       
      <button type="submit">create</button>

    </form>
</body>
</html>