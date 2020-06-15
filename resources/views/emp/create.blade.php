
@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3 align="center">Add a Employees</h3>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('emp.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="emp_id">Employee ID:</label>
                        <input type="text" class="form-control" name="emp_id" onkeypress="return onlyNumberKey(event)" maxlength="5" required />
                    </div>
                    <div class="form-group">
                        <label for="emp_name">Employee Name:</label>
                        <input type="text" class="form-control" name="emp_name"/>
                    </div>

                    <div class="form-group">
                        <label for="country_code">Country Code:</label>
                        <input type="text" class="form-control" name="country_code"/>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        {{--<input type="text" class="form-control" name="mobile" pattern=[7-9]{1}[0-9]{9}"/>--}}
                        <input type="tel" class="form-control"name="mobile" size="50%" onkeypress="return onlyNumberKey(event)" maxlength="10" required />

                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        {{--<input type="text" class="form-control" name="email"/>--}}
                        <input type="text" class="form-control"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="text" class="date form-control" name="dob" required readonly/>
                    </div>

                    <div class="form-group">
                        <label>Profile Image Upload</label>
                        <input type="file" name="profile" id="select_file" required/>
                        <span style="color:green">Only jpg,png image format Allowed</span>

                    </div>
                    <button type="submit" class="btn btn-primary-outline btn btn-primary" style="margin-right: 30px">Submit</button>
                    <button type="reset" class="btn btn-default-outline btn btn-primary">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function onlyNumberKey(evt) {
            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

    </script>

@endsection