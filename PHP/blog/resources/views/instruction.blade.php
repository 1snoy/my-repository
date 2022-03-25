<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
   html, body {
    margin: 0;
    height: 100%;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
    <div class="d-flex justify-content-center"><h1>{{$instruction->first()->title}}</h1></div>
    <div class="container">
        <iframe src="http://blog/pdf/{{$instruction->first()->content}}" style="width: 100%;height: 1000px;"  ></iframe>
    </div>
    <h1>Comment</h1>
    <form action="" method="post">
        @csrf
        <input type="text" name="comment">
        <input type="hidden" name="id_instruction" value="{{$instruction->first()->id}}">
        <input type="hidden" name="action" value="comment">
        <input type="submit" value="Отправить">
    </form>
    <div class="row justify-content-between" style="margin-right: 0px;" -15px;>
        <div class="col-auto"><a style="bottom: 0; left: 0;padding: 0px" href="http://blog">Назад</a></div>
        @if (Auth::check() and auth()->user()->is_admin == 1)
            <div class="" style="bottom: 0; right: 0;"><a href="http://blog/admin_panel">admin_panel</a></div>
        @endif
    </div>

</body>
</html>
