@extends('layouts.app')
@section('title') {{'Edit client'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <form method="POST" action="/clients/{{$client->id}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">First name</label>
                        <input class="form-control" name="first_name" value="{{$client->first_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last name</label>
                        <input class="form-control" name="last_name" value="{{$client->last_name}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">School role</label>
                            <input  class="form-control" name="school_role" value="{{$client->school_role}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Class</label>
                            <input class="form-control" name="class"  value="{{$client->class}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Head class teacher</label>
                            <input class="form-control" name="head_class_teacher"  value="{{$client->head_class_teacher}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">School subject</label>
                            <input class="form-control" name="school_subject"  value="{{$client->school_subject}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$client->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phones</label>
                        <input class="form-control" name="phone" value="{{$client->phone}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection