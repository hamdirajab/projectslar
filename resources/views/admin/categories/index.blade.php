@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>

    <div>
        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created date</th>
                <th>Updated date</th>
              </tr>
            </thead>
            <tbody>
            @if($categorise)
                @foreach($categorise as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : "no-date"}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "no-date"}}</td>
                  </tr>
                @endforeach
            @endif
            </tbody>
          </table>
    </div>

@endsection