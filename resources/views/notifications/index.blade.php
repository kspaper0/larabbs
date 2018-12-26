@extends('layouts.app')

@section('title')
Notifications
@stop

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">

                    <h3 class="text-center">
                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> My Notifications
                    </h3>
                    <hr>

                    @if ($notifications->count())

                        <div class="notification-list">
                            @foreach ($notifications as $notification)
                                @include('notifications.types._' . snake_case(class_basename($notification->type)))

    {{-- 因为通知数据库表的type字段， 保存的是通知类全称 --}}
    {{-- 如：App\Notifications\TopicReplied --}}
    {{-- 使用 snake_case() 辅助方法会将字符串格式为下划线命名 --}}
    {{-- class_basename() 会只取到 TopicReplied --}}
    {{-- 最后结果为 topic_replied --}}

                            @endforeach

                            {!! $notifications->render() !!}
                        </div>

                    @else
                        <div class="empty-block">Empty！</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@stop