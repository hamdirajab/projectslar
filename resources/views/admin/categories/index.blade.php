@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
              <div class="form-group">
                  {!! Form::label('name','Name') !!}
                  {!! Form::text('name',null,['class'=>'form-control']) !!}
               </div>
               <div class="form-group">
                   {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
               </div>
        {!! Form::close() !!}


    </div>

    <div class="col-sm-6">
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
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : "no-date"}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "no-date"}}</td>
                  </tr>
                @endforeach
            @endif
            </tbody>
          </table>
    </div>

@endsection