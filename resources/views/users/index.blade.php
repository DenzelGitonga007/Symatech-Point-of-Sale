<!-- Call the layouts -->
<x-app-layout>
    <!-- The users crud -->
    <div class="container-fluid">
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
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
                    <form action=""></form>
                </div>
            </div>
        </div>
    </div>

    <!-- Style for the modal -->
    <style>
        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate(25%, 0, 0);
        }
    </style>
</x-app-layout>
