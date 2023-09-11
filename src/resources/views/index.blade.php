<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    @foreach($big_questions as $big_question)
        <p>
            <a href="{{ route('quiz.id', ['id'=>$big_question->id]) }}">
                {{ $big_question->id }}：{{ $big_question->name }}
            </a>
        </p>
    @endforeach
    <a href="./admin">管理画面はこちら</a>
</body>

</html>