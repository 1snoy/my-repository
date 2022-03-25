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
    <h1>Добавить</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        title:<input type="text" name="title"><br>
        content:<input type="file" name="content"><br>
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Добавить">
    </form>
    <h1>Удалить</h1>
    <table border="1px solid black">
        <thead>
            <tr>
                <th colspan="3">title</th>
                <th>Удалить</th>
            </tr>
        </thead>
        @foreach ($all_instruction as $instruction)
            <tr>
                <td>{{$instruction->title}}</td>
                <td><a href="http://blog/instructions_pdf/{{$instruction->id}}"><img src="png-clipart-sign-badge-computer-icons-glass-font-3d-icon-glass-angle.png" alt="" width="21" height="21"></a></td>
                <td><a href="http://blog/instructions/{{$instruction->id}}"><img src="pngtree-child-magnifying-glass-illustration-black-magnifier-yellow-handle-blue-lens-png-image_452846.jpg" alt="" width="21" height="21"></a></td>
                <td>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$instruction->id}}">
                        <input type="hidden" name="action" value="delete_instruction">
                        <input type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h1>Заявки на инструкции</h1>
    <table border="1px solid black">
        <thead>
            <tr>
                <th colspan="3">title</th>
                <th>Подтвердить</th>
            </tr>
        </thead>
        @foreach ($instructions as $instruction)
            <tr>
                <td>{{$instruction->title}}</td>
                <td><a href="http://blog/instructions_pdf/{{$instruction->id}}"><img src="png-clipart-sign-badge-computer-icons-glass-font-3d-icon-glass-angle.png" alt="" width="21" height="21"></a></td>
                <td><a href="http://blog/instructions/{{$instruction->id}}"><img src="pngtree-child-magnifying-glass-illustration-black-magnifier-yellow-handle-blue-lens-png-image_452846.jpg" alt="" width="21" height="21"></a></td>

                <td>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$instruction->id}}">
                        <input type="hidden" name="action" value="allow">
                        <input type="submit" value="Добавить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h1>Пользователи</h1>
    <h2>Добавить</h2>
    <form action="" method="post">
        @csrf
        name:<input type="text" name="name"><br>
        email:<input type="email" name="email"><br>
        password:<input type="password" name="password"><br>
        admin:<input type="checkbox" name="is_admin"><br>
        <input type="hidden" name="action" value="create">
        <input type="submit" value="Добавить">
    </form>
    <h2>Удалить</h2>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>admin</th>
                <th>banned</th>
                <th>Удалить</th>
            </tr>
        </thead>
        @foreach ($all_users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->is_admin}}</td>
                <td>{{$user->is_banned}}</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="action" value="delete_user">
                        <input type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h2>Блокировать</h2>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>admin</th>
                <th>banned</th>
                <th>Блокировать</th>
            </tr>
        </thead>
        @foreach ($all_users_nbanned as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->is_admin}}</td>
                <td>{{$user->is_banned}}</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="action" value="ban_user">
                        <input type="submit" value="Блокировать">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h2>Разблокировать</h2>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>admin</th>
                <th>banned</th>
                <th>Разблокировать</th>
            </tr>
        </thead>
        @foreach ($all_users_banned as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->is_admin}}</td>
                <td>{{$user->is_banned}}</td>
                <td>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="action" value="unban_user">
                        <input type="submit" value="Разблокировать">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <footer>
        <div style="bottom: 0; left: 0;"><a href="http://blog">Назад</a></div>
    </footer>
</body>
</html>
