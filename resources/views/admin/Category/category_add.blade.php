@extends('admin.admin-layouts.master')
@section('content')

<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="POST" id="category-us-form">
                @csrf
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
                   Expensive
                </h4>

                <div class="form-group row">
                  <label for="input-12" class="col-sm-3 col-form-label">Category Name</label>
                  <div class="col-sm-3">
                    <input type="text" id="" class="form-control" name="expense_category_name" required>
                  </div>


                </div>


                <div class="form-footer mb-3">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button>

                    <button type="submit" name="submit" class="btn btn-success" id="saveCategory"> Create</button>


                    <a href="{{url('/expense/')}}" class="btn btn-danger" style="float: right;"> return</a>
                </div>
              </form>


        <!-- table -->
        <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>result</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Expense Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $x = 1;
                @endphp


                @foreach($categories as $category)
                  <tr>
                    <td>@php echo $x; @endphp</td>
                    <td>{{$category->expense_category_name}}</td>
                    <td>

                      <a   href=""  id="deleteId" data-id="{{$category->id}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @php
                  $x++;
                  @endphp
                  @endforeach
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->



            </div>
          </div>
        </div>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@endsection


