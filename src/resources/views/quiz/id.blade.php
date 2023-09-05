<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div class="main">
        @foreach($questions as $question)
            <div class="quiz">
                <h1>{{ $loop -> index + 1 }}. この地名はなんて読む？</h1>
                <img src="/img/{{ $question->image }}">
                <ul>
                    @foreach ($choices->where('question_id', $question->id) as $choice)
                        <li 
                            id="answerlist_{{ $question->id }}_{{ $loop->index + 1 }}"
                            name="answerlist_{{ $question->id }}"
                            class="answerlist"
                            onclick="check(
                                {{ $question->id }},
                                {{ $loop->index + 1 }},
                                {{ $choices->where('question_id', $question->id)->where('valid', true)->first()->id - (($question->id - 1) * 3) }}
                            )"
                        >{{ $choice->name }}</li>
                    @endforeach
                    <li id="answerbox_{{ $question->id }}" class="answerbox">
                        <span id="answertext_{{ $question->id }}"></span><br>
                        <span>
                            正解は「
                            {{ $choices->where('question_id', $question->id)->where('valid', true)->first()->name }}
                            」です！
                        </span>
                    </li>
                </ul>
            </div>
        @endforeach
        <script src="{{ asset('/js/main.js') }}"></script>
    </div>
</body>

</html>