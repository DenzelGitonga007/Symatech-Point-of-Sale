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
            <div class="col-md-8">
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
                                            <a href="" class="btn btn-sm btn-outline-success add_more rounded-circle">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="addMoreProduct">
                                    <!-- Displaying the products -->
                                    <tr>
                                        <!-- Id -->
                                        <td>1</td>
                                        <!-- Product name -->
                                        <td>
                                            <select name="product_id" id="product_id" class="form-select form-control product_id" aria-label="Default select example">
                                                <option selected>Select product</option>
                                                @foreach ($products as $product)
                                                    <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->product_name }}</option>
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
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                        </td>
                                        <!-- Price -->
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <!-- Total -->
                                        <td>
                                            <input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount" disabled>
                                        </td>
                                        <!-- To delete the product from the order table -->
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-danger rounded-circle">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    
                                </tbody>
                                
                            </table>
                            
                        </div>
                </div>
            </div>
            <!-- Displaying the total and the pay section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> 
                        <h4>Total <b class="total"> 00.00 </b></h4> 
                    </div>
                        <div class="card-body">
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped">
                                        <tr>
                                            <!-- Calling the user details on the foreach loop -->
                                            @foreach ($users as $user)
                                            <!-- Customer_name -->
                                            <td>
                                                <label for="" class="form-label">Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text"name="customer_name" id="" class="form-control" value="{{ $user -> name }}" disabled>
                                                    </div>
                                            </td>
                                            <!-- Customer phone number -->
                                            <td>
                                                <label for="" class="form-label">Phone Number</label>
                                                    <div class="col-md-6">
                                                        <input type="number" name="name" id="" class="form-control">
                                                    </div>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
    <!-- The JavaScript for adding a product into the ordered-products table -->
    @section('script')
        <script>
            $('.add_more').on('click', function(){
                // Prevent page reload
                event.preventDefault();
                var product = $('.product_id').html();
                var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
                // Adding products onto the order table
                var tr = '<tr><td class"no"">' + numberofrow + '</td>' +
                        '<td><select class="form-control form-select product_id" name="product_id[]" >' + product + 
                        ' </select></td>' +
                        '<td> <input type="number" name="quatity[]" class="form-control quantity"></td>'+
                        '<td> <input type="number" name="price[]" class="form-control price"></td>'+
                        '<td> <input type="number" name="total_amount[]" class="form-control total_amount"></td>'+
                        // To delete the added products
                        '<td> <a class="btn btn-sm btn-outline-danger delete rounded-circle"><i class="fa fa-times-circle"></a></td>';
                // Append onto the table
                $('.addMoreProduct').append(tr);                      
            })
            // To delete the added product(s) row
            $('.addMoreProduct').delegate('.delete', 'click', function(){
                $(this).parent().parent().remove();
            })

            // Doing the computations of the prices and quantities
            function totalAmount() {
                var total = 0;
                $('.total_amount').each(function(i, e){
                    var amount = $(this).val() - 0;
                    total += amount;
                });

                $('.total').html(total); // class total is for the total div on the right
            }

            $('.addMoreProduct').delegate('.product_id', 'change', function(){
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);
                var quantity = tr.find('.quantity').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total_amount = (quantity * price);
                tr.find('.total_amount').val(total_amount);
                // Call the function now
                totalAmount();
            });

            $('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function(){
                var tr = $(this).parent().parent();
                var quantity = tr.find('.quantity').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total_amount = (quantity * price);
                tr.find('.total_amount').val(total_amount);
                // Call the function now
                totalAmount();
                
            })


        </script>
    @endsection
</x-app-layout>
