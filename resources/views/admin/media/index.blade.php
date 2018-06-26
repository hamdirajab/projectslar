@extends('layouts.admin')
@section('content')

    <h1>Media</h1>
    @if($photos)
        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <dinv class="form-group">
                <input type="submit" name="delete_all" class="btn-primary" value="Submit">
            </dinv>
            <table class="table">
                <thead>
                  <tr>
                      <th><input type="checkbox" id="options"></th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Created date</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                      <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img height="50px" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no-date'}}</td>
                        <td>
                            <input type="hidden" name="photo_id" value="{{$photo->id}}" >
                            <div class="form-group">
                                <input type="submit" name="delete_single" value="Delete" class="btn-danger">
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
      </form>
    @endif
@endsection

@section('scripts')

    <script>

        $(document).ready(function () {

            $('#options').click(function () {
                if(this.checked){
                    $('.checkBoxes').each(function () {

                        this.checked = true;

                    });
                }else {
                    $('.checkBoxes').each(function () {

                        this.checked = false;

                    });
                }
            });
        });
    </script>


@endsection