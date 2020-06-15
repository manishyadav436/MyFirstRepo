@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-sm-12">

                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <h5 class="display-5">Employees</h5>
                                <div>
                                    <a style="margin: 19px;" href="{{ route('emp.create')}}" class="btn btn-primary">New Record</a>
                                </div>
                                <table class="mdl-data-table table-bordered" id="myTable" width="100%">
                                    <thead>
                                    <tr>
                                        {{--<td>Id</td>--}}
                                        <td>Employee Id</td>
                                        <td>Employee Name</td>
                                        <td>Mobile</td>
                                        <td>Email</td>
                                        <td>Date of Birth</td>
                                        <td>Profile Photo</td>
                                        <td>Actions</td>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
