@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="col-sm-12">
            <h1 class="display-3">Employees</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('emp.create')}}" class="btn btn-primary">New Record</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Employee Id</td>
                    <td>Employee Name</td>
                    <td>Mobile</td>
                    <td>Email</td>
                    <td>Date of Birth</td>
                    <td>Profile Photo</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($empdata as $emp)
                    <tr>
                        <td>{{$emp->emp_id}}</td>
                        <td>{{$emp->emp_name}}</td>
                        <td>{{$emp->mobile}}</td>
                        <td>{{$emp->email}}</td>
                        <td>{{$emp->dob}}</td>
                        <td>{{$emp->profile}}</td>
                        <td>
                            <a href="{{ route('emp.edit',$emp->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('emp.destroy', $emp->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>

@endsection