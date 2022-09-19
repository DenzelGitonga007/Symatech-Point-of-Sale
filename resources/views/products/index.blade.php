<!-- Call the layouts -->
<x-app-layout>
    <!-- The products crud -->
    <div class="container-fluid">
        <!-- The success message upon creation of a product -->
            <!-- Successfull product creation -->
        @if (Session::has('product_create_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('product_create_success') }}
            </div>
            <!-- Fail to create product -->
        @elseif (Session::has('product_create_fail'))  
             <div class="alert alert-danger" role="alert">
                {{ Session::get('product_create_fail') }}
             </div>
             <!-- Successfull product details update -->
        @elseif (Session::has('edit_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('edit_success') }}
            </div>
            <!-- Fail to update product -->
        @elseif (Session::has('edit_error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('edit_error') }}
            </div>
            <!-- Successfull product deletion -->
        @elseif (Session::has('delete_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('delete_success') }}
            </div>
           <!-- Successfull product deletion -->
        @elseif (Session::has('delete_error'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('delete_error') }}
            </div>
        @endif
        <!-- The products table -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h4 style="float: left;">Add Product</h4> 
                        <a href="#" style="float: right;" class="btn btn-outline-success" data-toggle="modal" data-target="#addproduct"> 
                        <i class="fa fa-plus"></i> Add New Product</a> 
                    </div>
                        <div class="card-body">
                            <!-- The products crud table -->
                            <table class="table table-bordered table-left table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Stock Status</th>
                                        <th>Description</th>
                                        <!-- The other crud actions -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Displaying the products -->
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if ($product->alert_stock < $product->quantity)
                                                <span class="badge bg-danger">Low stock -> {{ $product->alert_stock }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $product->alert_stock }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <!-- The other crud actions -->
                                        <td>
                                            <!-- Edit -->
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editproduct{{ $product->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </div>

                                            <!-- Delete -->
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal to edit product -->
                                    <div class="modal right fade" id="editproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addproductLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="addproductLabel">Edit {{ $product->name }}</h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form for adding a new product -->
                                                    <form action="{{ route('products.update', $product->id) }}" method="POST"> 
                                                        <!-- The cross-site forgery token -->
                                                        @csrf 
                                                        @method('put') <!-- Updates the resource -->
                                                        <!-- The input fields -->
                                                        <!-- Name -->
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                                        </div>
                                                        
                                                        <!-- Email -->
                                                        <div class="form-group" style="margin-top: 12px;">
                                                            <label for="" class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $product->email }}">
                                                        </div>
                                                        
                                                        <!-- Phone -->
                                                        <!-- <div class="form-group" style="margin-top: 12px;">
                                                            <label for="" class="form-label">Phone</label>
                                                            <input type="tel" class="form-control" name="phone">
                                                        </div> -->
                                                        
                                                        <!-- Password -->
                                                        <div class="form-group" style="margin-top: 12px;">
                                                            <label for="" class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="password" readonly value="{{ $product->password }}">
                                                        </div>
                                                        
                                                        <!-- Confirm Password -->
                                                        <!-- <div class="form-group" style="margin-top: 12px;">
                                                            <label for="" class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control" name="confirm_password">
                                                        </div> -->
                                                        
                                                        <!-- Role -->
                                                        <div class="form-group" style="margin-top: 12px;">
                                                            <label for="" class="form-label">Role</label>
                                                            <select name="role" id="" class="form-control">
                                                                <option value="1" @if ($product->role == 1) selected @endif> Admin</option>
                                                                <option value="2" @if ($product->role == 2) selected @endif> Customer</option>
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <!-- The save button     -->
                                                        <div class="modal-footer" style="margin-top: 12px;">
                                                            <button class="btn btn-outline-success w-100">Update {{$product->name }} Details</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal to delete product -->
                                    <div class="modal center fade" id="deleteproduct{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addproductLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="addproductLabel">Edit {{ $product->name }}</h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form for adding a new product -->
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"> 
                                                        <!-- The cross-site forgery token -->
                                                        @csrf 
                                                        @method('delete') <!-- Updates the resource -->
                                                        <!-- The input fields -->
                                                        <!-- Name -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p>Are you sure you want to delete {{ $product->name }}?</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <br>
                                                        <!-- The Delete button     -->
                                                        <div class="modal-footer" style="margin-top: 12px;">
                                                            <!-- Cancel -->
                                                            <button class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
                                                            <!-- Confirm -->
                                                            <button class="btn btn-outline-danger">Yes, delete {{$product->name }} </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"> <h4>Search product</h4> </div>
                        <div class="card-body">
                            ....
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to add new product -->
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addproductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addproductLabel">Add product</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding a new product -->
                    <form action="{{ route('products.store') }}" method="POST"> 
                        <!-- The cross-site forgery token -->
                        @csrf 
                        <!-- The input fields -->
                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name">
                        </div>
                        
                        <!-- Brand -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Brand</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                
                        <!-- Price -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        
                        <!-- Quantity -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity">
                        </div>
                        
                        <!-- Stock -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Stock</label>
                            <input type="number" class="form-control" name="alert_stock">
                        </div>

                        <!-- Description -->
                        <div class="form-group" style="margin-top: 12px;">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <br>
                        <!-- The save button     -->
                        <div class="modal-footer" style="margin-top: 12px;">
                            <button class="btn btn-outline-success w-100">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Style for the modal for adding new product-->
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
