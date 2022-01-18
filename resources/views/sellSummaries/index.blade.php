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

                            <h2>Date Range</h2>
                                <form action="{{ route('sellsummary.show') }}" method="POST">
                                    @csrf
                                    <div class="col-md-3"> 
                                        <div class="form-group">
                                            <label for="">From Date</label>
                                            <input type="date" class="form-control" placeholder="From..." id="min" name="min">
                                        </div>
                                        <div class="form-group">
                                            <label for="">To Date</label>
                                            <input type="date" class="form-control" placeholder="To..." id="max" name="max">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Company</label>
                                            <select name="company_id" id="" class="form-control">
                                                <option value="">Select Company</option>
                                                @foreach ($company as $data)
                                                <option value="{{ $data->name }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <br><br><br><br><br><br><br><br>

                                    <button class="btn btn-primary">Search</button>



                                <h2 class="text-center">{{ trans('Sell Summary List'); }}</h1></h2>

                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Employee</th>
                                                        <th>Company</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php $no = 1; ?>
                                            		@foreach($sells as $data)
                                                        
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->created_date }}</td>
                                                        <td>
                                                            <form action="{{ route('perEmployee', $data->employee) }}">      
                                                                <button type='submit' class='btn btn-info btn-sm'>Detail</button>
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
            ajax: "{{ route('items.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
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
        const itemPrice = document.getElementById("selected_price");
        itemPrice.onchange = function(e){
            const price = e.target.options[e.target.selectedIndex].dataset.price;
            console.log(price);
            document.getElementById("price_item").value = price
        }
</script>