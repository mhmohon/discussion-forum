<html>
    <head>
        <style>
            @page {
                header: page-header;
                footer: page-footer;
            }
        </style>
    </head>

    <body>
        <htmlpageheader name="page-header">
            Your Header Content
        </htmlpageheader>
             <h3>{{ $idea->title }} </h3>
             <p>{!! $idea->description !!} <br>

                By {{ $idea->name }} Posted on: {{ \Carbon\Carbon::parse($idea->start_date)->format('d M Y') }}</div>
            </p>
             <h4>All Comments</h4>
            @if($comments->count())
                 @foreach($comments as $comment)
                    <p>{{ $comment->description }} <br>
                    By {{ ucfirst($comment->name) }} Time: {{ $comment->created_at->diffForHumans() }}</p>
                 @endforeach
            @else
                <p>No Comments on this Idea</p>
            @endif
        <htmlpagefooter name="page-footer">
            Your Footer Content
        </htmlpagefooter>
    </body>
</html>
