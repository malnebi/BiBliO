@extends('layouts.app')
@section('title') {{'New client'}} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/clients">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">First name</label>
                        <input class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last name</label>
                        <input class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">School role</label>
                        <input  class="form-control" name="school_role">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Class</label>
                        <input class="form-control" name="class">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Head class teacher</label>
                        <input class="form-control" name="head_class_teacher">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">School subject</label>
                        <input class="form-control" name="school_subject">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phones</label>
                        <input class="form-control" name="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
