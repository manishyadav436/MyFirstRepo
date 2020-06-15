
@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update Employee</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('emp.update', $emp->id) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="emp_id">Employee ID:</label>
                    <input type="text" class="form-control" name="emp_id" value={{ $emp->emp_id }} />
                </div>
                <div class="form-group">
                    <label for="emp_name">Employee Name:</label>
                    <input type="text" class="form-control" name="emp_name" value={{ $emp->emp_name }} />
                </div>

                <div class="form-group">
                    <label for="country_code">Country Code:</label>
                    <input type="text" class="form-control" name="country_code" value={{ $emp->country_code }} />
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" name="mobile" value={{ $emp->mobile }} />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value={{ $emp->email }} />
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="text" class="form-control" name="dob" value={{ $emp->dob }} />
                </div>
                <div class="form-group">
                    <label for="profile">Profile:</label>
                    <input type="text" class="form-control" name="profile" value={{ $emp->profile }} />
                </div>
                <button type="submit" class="btn btn-primary-outline">Update</button>
                <button type="reset" class="btn btn-default-outline">Cancel</button>
            </form>
        </div>
    </div>
@endsection