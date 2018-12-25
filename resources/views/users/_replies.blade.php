@if (count($replies))

<ul class="list-group">
    @foreach ($replies as $reply)
        <li class="list-group-item">
            <a href="{{ $reply->topic->link(['#reply' . $reply->id]) }}">
                {{ $reply->topic->title }}
            </a>

            <div class="reply-content" style="margin: 6px 0;">
                {!! $reply->content !!}
            </div>

            <div class="meta">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Replied at {{ $reply->created_at->diffForHumans() }}
            </div>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">Nothing to display ~_~ </div>
@endif

{{-- 分页显示 --}}
{!! $replies->appends(Request::except('page'))->render() !!}
{{-- 因为有 topic 和 reply 两个标签 --}}
