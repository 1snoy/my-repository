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
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        Поиск:<input type="text" name="findtext">
        <input type="hidden" name="action" value="find">
        <input type="submit" value="Найти">
    </form>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>title</th>
                <th>Скачать</th>
            </tr>
        </thead>
    @foreach ($instructions as $instruction)
        @if ($instruction->admin_on==1)
            <tbody>
                <tr>
                    <td><a href="http://blog/instructions/{{$instruction->id}}">{{$instruction->title}}</a></td>
                    <td><a href="http://blog/instructions_pdf/{{$instruction->id}}"><img src="png-clipart-sign-badge-computer-icons-glass-font-3d-icon-glass-angle.png" alt="" width="61" height="61"></a></td>
                </tr>
            </tbody>
        @endif

    @endforeach
    </table>
    @if (Auth::check())
        <p><a href="http://blog/add_instruction">Добавить</a></p>
    @endif

    <div class="row justify-content-between" style="margin-right: 0px;" -15px;>
        <div class="col-auto"><a style="bottom: 0; left: 0;padding: 0px" href="http://blog">Назад</a></div>
        @if (Auth::check() and auth()->user()->is_admin == 1)
            <div class="" style="bottom: 0; right: 0;"><a href="http://blog/admin_panel">admin_panel</a></div>
        @endif
    </div>
</body>
</html>
