@extends('layouts.master')

@section('main-menu')
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title"></h3>
                    <div id="toastr-demo" class="panel">
                        <div class="panel-body">
                            @if(session('status'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{session('status')}}
                                </div>
                            @endif
                                <h2 class="text-center">{{ trans('items.list'); }}</h1></h2>

                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                {{ trans('validation.btn_add'); }}
                                            </button>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Employee</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	
                                            		@foreach($items as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->price }}</td>
                                                        <td>{{ $data->discount }}</td>
                                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                        <td>{{ $data->created_date }}</td>
                                                        <td>
		                                                    <form action="{{ route('sells.update', $data->id) }}">
																
																<button type='submit' class='btn btn-info btn-sm' data-toggle="modal" data-target="#desc">Details</button>
															</form>
														</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>      
@stop







<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('items.create'); }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="modal-body">
                    <form action="{{ route('sells.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="item">Item</label>
                            <select class="form-control" name="item" id="withPrice">
                            {{-- <!-- @foreach($listItem as $idItem => $item) --> --}}
                            @foreach($listItem as $data)
                                <option value={{$data->id}} data-price ="{{$data->price}}" id="itemPrice">{{ $data->name }}</option>
                            {{--	<!-- <option value="{{$idItem}}">{{ $item }}</option> -->  --}}
                            @endforeach
                        	</select>


                            @error ('item')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price_item" class="form-control @error ('price') is-invalid @enderror" name="price" placeholder="{{__('price')}}..." value="{{ old('price') }}" >
                            {{--
                            <select class="form-control" id="price_item" name="price">
                            @foreach($listItem as $item)
                                <option value="{{ $item->price }}" id="price_item">{{ $item->price }}</option>
                            <option value="">{{ $item }}</option>
                            @endforeach
                        	</select>
                            --}}
                            
                            @error ('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input value="6" type="text" class="form-control @error ('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}">

                            @error ('discount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="item">Employee</label>
                            <select class="form-control" id="employee" name="employee">
                            @foreach($listEmployee as $employee)
                            	<option value="{{$employee->id}}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        	</select>

                            @error ('item')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('validation.btn_close'); }}</button>
                        <button type="submit" class="btn btn-primary">{{ trans('validation.btn_submit'); }}</button>
                    </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

    


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#itemTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sells.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'item', name: 'item'},
                {data: 'price', name: 'price'},
                {data: 'discount', name: 'discount'},
                {data: 'employee', name: 'employee'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.25/pagination/input.js"></script>


<script type="text/javascript">
        const itemPrice = document.getElementById("withPrice");
        itemPrice.onchange = function(e){
            const price = e.target.options[e.target.selectedIndex].dataset.price;
            console.log(price);
            document.getElementById("price_item").value = price
        }
</script>

