<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <form action="/admin/login" method="POST">
        @csrf
        <div>
            <span>ユーザーID</span>
            <input type="text" name="userId">
        </div>
        <div>
            <span>パスワード</span>
            <input type="password" name="password">
        </div>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>