@extends('admin.admin-layouts.master')
@section('content')

    <div class="container">

        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Invoice +</button>

        <!-- Data Show -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Date</th>
                                        <th>Invoice To</th>
                                        <th>Contact</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->

    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection








<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Invoice Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post" id="invoice-us-form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="" method="POST" id="invoice-us-form">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="input-12" class="col-sm-2 col-form-label">Invoice Date</label>
                                        <div class="col-sm-3">
                                            <input type="datetime-local" class="form-control" name="invoice_date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12" class="col-sm-2 col-form-label">Invoice To</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="invoice_to" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12" class="col-sm-2 col-form-label">Invoice contact</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="invoice_contact" required>
                                        </div>
                                    </div>



                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>

                                                <th scope="col">Price</th>

                                                <th scope="col"><button id="add_new_invoice" type="button"
                                                        name="add_new" class="btn btn-sm btn-success">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="mainbody">
                                            <tr>
                                                <td><input class="item" type="text" name="addmore[0][item]" required>
                                                </td>
                                                <td><input class="price" type="number" name="addmore[0][price]"
                                                        id="price0" required></td>

                                            </tr>
                                        </tbody>


                                    </table>

                                    <br>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary float-left"
                                        id="saveinvoice">Save</button><br><br>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Add Modal -->

<!--Show Details Modal -->
<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Invoice Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post" id="invoice-us-form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="form-group row">
                                    <label for="input-12" class="col-sm-2 col-form-label">Invoice Date</label>
                                    <div class="col-sm-3">
                                        <input type="datetime-local" class="form-control" name="invoice_date" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input-12" class="col-sm-2 col-form-label">Invoice To</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="invoice_to" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input-12" class="col-sm-2 col-form-label">Invoice contact</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="invoice_contact" readonly>
                                    </div>
                                </div>


                                <label for="input-12" class="col-sm-2 col-form-label">Items</label>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                    </tbody>


                                </table>

                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Show Details Modal -->
@section('scripts')

    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });

    </script>



@endsection
