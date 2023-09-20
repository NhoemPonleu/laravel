<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Form </title>
</head>
<body>
    <h1>Hello world</h1>
    <div>
        <h1>Student List</h1>
        <!-- @foreach ($users as $user)
            <p>This is user {{ $user->id }}</p>
            <p>This is user {{ $user->name }}</p>
        @endforeach
        <form action="/student_search" method="get">
            @csrf
            <input type="text" name="key_term"/>
            <input type="submit" value="SEARCH" />

        </form> -->
        @foreach ($users as $user)
            <p>This is user {{ $user->id }} <a href="{{ route('find_student', [$user->id, $user->name]) }}"</p>
            <p>This is user {{ $user->name }}</p>
        @endforeach
    </div>
</body>
</html>