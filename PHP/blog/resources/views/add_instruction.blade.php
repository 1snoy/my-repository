<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
    <h1>Заявки на инструкции</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        title:<input type="text" name="title"><br>
        content:<input type="file" name="content"><br>
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Добавить">
    </form>
    <div class="row justify-content-between" style="margin-right: 0px;" -15px;>
        <div class="col-auto"><a style="bottom: 0; left: 0;padding: 0px" href="http://blog">Назад</a></div>
        @if (Auth::check() and auth()->user()->is_admin == 1)
            <div class="" style="bottom: 0; right: 0;"><a href="http://blog/admin_panel">admin_panel</a></div>
        @endif
    </div>

</body>
</html>
