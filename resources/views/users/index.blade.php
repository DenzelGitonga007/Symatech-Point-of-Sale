<!-- Call the layouts -->
<x-app-layout>
    <!-- The users crud -->
    <div class="container-fluid">
        <!-- The success message upon creation of a user -->
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @elseif (Session::has('fail'))  
             <div class="alert alert-danger" role="alert">
                {{ Session::get('fail') }}
             </div> 
        @endif
        <!-- The users table -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h4 style="float: left;">Add User</h4> 
                        <a href="#" style="float: right;" class="btn btn-success" data-toggle="modal" data-target="#addUser"> 
                        <i class="fa fa-plus"></i> Add New User</a> 
                    </div>
                        <div class="card-body">
                            <!-- The users crud table -->
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <!-- <th>Phone</th> -->
                                        <th>Role</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Displaying the users -->
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <!-- Not to display the 1 and/or 2 for the user roles -->
                                        <td>@if ($user->role == 1) 
                                                Admin
                                            @else 
                                                Customer
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"> <h4>Search User</h4> </div>
                        <div class="card-body">
                            ....
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to add new user -->
    <!-- Modal -->
    <div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addUserLabel">Add User</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding a new user -->
                    <form action="{{ route('users.store') }}" method="POST"> 
                        <!-- The cross-site forgery token -->
                        @csrf 
                        <!-- The input fields -->
                        <!-- Name -->
                        <div class="form-group">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        
                        <!-- Phone -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                        
                        <!-- Password -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        
                        <!-- Confirm Password -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                        </div>
                        
                        <!-- Role -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Customer</option>
                            </select>
                        </div>
                        <br>
                        <!-- The save button     -->
                        <div class="modal-footer" style="margin-top: 12px;">
                            <button class="btn btn-outline-success w-100">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Style for the modal -->
    <style>
        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 19vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate(25%, 0, 0);
        }
    </style>
</x-app-layout>
