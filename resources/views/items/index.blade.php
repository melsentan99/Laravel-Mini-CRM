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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItem">
                                                {{ trans('validation.btn_add'); }}
                                            </button>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="itemTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            {{-- <!--         @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->price }}</td>
                                                    </tr>
                                                    @endforeach --> --}}
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
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('items.create'); }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="modal-body">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="barang1" type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') }}">

                            @error ('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input value="10.000" type="text" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" aria-describedby="emailHelp" value="{{ old('price') }}">

                            @error ('price')
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




