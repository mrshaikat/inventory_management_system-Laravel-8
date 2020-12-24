@extends('admin.layouts.app')

@section('main-content')
		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active"><h5>POS (Point of Sale)</h5></li>
								<li class=" ml-3">{{ date('d/m/y') }}</li>
							</ul>
						</div>
					</div>
				</div>
                <!-- /Page Header -->
                <div class="mt-2 mb-2">
                 @foreach($all_category as $category)
                 <a class="btn btn-info btn-sm mb-1" href="">{{ $category -> cat_name }}</a>
                 @endforeach

                </div>




            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <h4 class=" text-white bg-primary p-3">Customer
                            <a class=" btn btn-sm btn-success pull-right" data-toggle="modal" href="#customer-modal">Add New</a>


                        </h4>
                        <select class="form-control m-0 p-0" name="" id="">
                            <option disabled selected value="">Select Customer</option>

                            @foreach($all_customer as $customer)
                            <option value="{{ $customer -> id }}">{{ $customer -> name }}</option>
                            @endforeach


                        </select>
                    </div>

                    {{-- pricing table --}}
                        <div class="card mb-5 box-shadow text-center">



                                <ul class="list-unstyled" style="border: 1px solid grey;">
                                   <table class=" table table-striped table-hover" >
                                       <thead class=" bg-info">
                                        <th class=" text-white">Name</th>
                                        <th class=" text-white">Qty</th>
                                        <th class=" text-white">Single Price</th>
                                        <th class=" text-white">Sub Total</th>
                                        <th class=" text-white">Acion</th>
                                       </thead>
                                       <tbody>
                                            <tr>
                                                <td>shaikat</td>
                                                <td>
                                                    <input style="width: 30px;" type="text" name="" id="">
                                                </td>
                                                <td>shaikat</td>
                                                <td>415</td>
                                                <td><a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a></td>
                                            </tr>
                                       </tbody>
                                   </table>
                                </ul>


                            <div class=" pricing-footer bg-primary">
                                <p style="font-size: 20px;"><strong>Quentity: 00.00</strong></p>
                                <p style="font-size: 20px;"><strong>Product: 00.00</strong></p>
                                <p style="font-size: 20px;"><strong>Vat: 00.00</strong></p>

                                <hr>
                                <p>
                                    <h3 class="text-white"><strong>Total Amount: 00.00</strong> </h3>
                                </p>

                            </div>

                            <div class="submit-section mb-3 mt-3">
                                <button class="btn btn-success">Create Invoice</button>
                            </div>


                        </div>




                </div>

                <div class="col-md-8">
                    <div class="table-responsive">
                        <table id="data-table-data" class="table table-striped mb-0">
                            <thead>


                                <tr>


                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Category</th>




                                    <th>Product Code</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_product as $product)
                                <tr>





                                    <td>
                                        <a class="mr-3" href="#"><i class="fa fa-plus"></i></a>
                                        @if( !empty($product -> product_image) )

                                            <img style="height: 50px; width: 50px;" src="{{ URL::to('/') }}/media/product_photos/{{ $product -> product_image }}" alt="">
                                        @endif


                                    </td>
                                    <td>{{ $product -> product_name }}</td>
                                    <td></td>
                                    {{-- <td>{{ $product-> catagories-> cat_name }}</td> --}}
                                    <td>{{ $product -> product_code }}</td>




                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

			</div>
		</div>
        <!-- /Page Wrapper -->

        {{-- Customer Model --}}

        <div id="customer-modal" class=" modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class=" modal-header">
                        <h4 class=" modal-title">Add New Customer</h4>



                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Customer Name" value="" >

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">E-mail</label>
                                    <input type="text" class="form-control" id="" placeholder="Customer E-mail" value="" >

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" id="" placeholder="Customer Phone" value="" >

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" id="" placeholder="Address" value="" >

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Shope name</label>
                                    <input type="text" class="form-control" id="" placeholder="Shope name" value="" >

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" id="" placeholder="City" value="" >

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label for="">Accounter Number</label>
                                    <input type="text" class="form-control" id="" placeholder="Accounter Number" value="" >

                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Account Holder</label>
                                    <input type="text" class="form-control" id="" placeholder="Account Holder Name" value="" >

                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Bank Number</label>
                                    <input type="text" class="form-control" id="" placeholder="Bank Number" value="" >

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label for="">Branch Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Bank Branch Name" value="" >

                                </div>

                                <div class="col-md-4 mb-3">
                                    <img class="" id="image" src="#">
                                    <label for="">Photo</label>


                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Photo</label>
                                    <input type="file" class="" name="photo" accept="image/*" class="upload" onchange="readURL(this);">

                                </div>
                            </div>





                            <div class="form-group">
                                <input class="btn btn-info btn-block" type="submit" value="Add Customer">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            function readURL(input){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function (e){
                        $('#image')
                            .attr('src', e.target.result)
                            .width(80)
                            .height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

@endsection


