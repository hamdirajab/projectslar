@extends('layouts.admin')


@section('content')

    @if(Session::has('delete_post'))

        <p class="bg-danger">{{session('delete_post')}}</p>

    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
              <th>id</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
          @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                  <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</td></a>
                  <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{str_limit($post->body ,15 )}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
          @endforeach
        @endif

        </tbody>
      </table>





@endsection