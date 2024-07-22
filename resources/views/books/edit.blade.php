@extends('layouts.app')
@section('title') {{'Edit book'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/books/{{$book->id}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Autors first name</label>
                        <input class="form-control" name="author_fname" value="{{$book->author_fname}}">
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Last name</label>
                        <input class="form-control" name="author_lname" value="{{$book->author_lname}}">
                        </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input  class="form-control" name="title" value="{{$book->title}}"  >
                        </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Publisher name</label>
                            <input class="form-control" name="publisher_name" value="{{$book->publisher_name}}">
                        </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Publisher place</label>
                            <input class="form-control" name="publisher_place" value="{{$book->publisher_place}}" >
                        </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">year</label>
                            <input class="form-control" name="year"  value="{{$book->year}}">
                            @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    
                        </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection