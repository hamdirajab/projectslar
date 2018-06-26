@extends('layouts.admin')


@section('content')

    @if(count($replies) > 0)
        <h1>replies</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
            </thead>
            @foreach($replies as $reply)
                <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$post_slug)}}">View Post</a></td>
                    <td>
                        @if($reply->is_Active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_Active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_Active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    @else
        <h1 class="text-center">No replies</h1>
    @endif
@endsection