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
        @endif
        <!-- The products table -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> 
                        <h4 style="float: left;">Ordered Product</h4> 
                        <a href="#" style="float: right;" class="btn btn-outline-success" data-toggle="modal" data-target="#addproduct"> 
                        <i class="fa fa-plus"></i> Order A New Product</a> 
                    </div>
                        <div class="card-body">
                            <!-- The products crud table -->
                            
                            <table class="table table-bordered table-left table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <!-- <th>Description</th> -->
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <!-- <th>Stock Status</th> -->
                                        
                                        <!-- The other crud actions -->
                                        <!-- <th>Actions</th> -->
                                        <!-- To add another product -->
                                        <th>
                                            <a href="" class="btn btn-sm btn-success add_more">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Displaying the products -->
                                    <tr>
                                        <!-- Id -->
                                        <td></td>
                                        <!-- Product name -->
                                        <td>
                                            <select name="product_id" id="product_id" class="form-select form-control product_id" aria-label="Default select example">
                                                @foreach ($products as $product)
                                                    <option selected>Select product</option>
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <!-- Product description -->
                                        <!-- <td>
                                            <textarea name="description" id="description" cols="30" rows="10">
                                                
                                            </textarea>
                                        </td> -->
                                        <!-- Quantity -->
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control">
                                        </td>
                                        <!-- Price -->
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control">
                                        </td>
                                        <!-- Total -->
                                        <td>
                                            <input type="number" name="total[]" id="total" class="form-control" disabled>
                                        </td>
                                        <!-- To delete the product from the order table -->
                                        <td>
                                            <a href="" class="btn btn-sm btn-danger delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    
                                </tbody>
                                
                            </table>
                            
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"> 
                        <h4>Total 00.00</h4> 
                    </div>
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
