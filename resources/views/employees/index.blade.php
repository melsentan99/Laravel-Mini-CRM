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
                           
                                <h2 class="text-center">{{ __('employee.list') }}</h2>
                            
                                
                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                              {{ Auth::user()->lang == 'en' ? 'Add' : 'Tambah' }}
                                            </button>

                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="employeeTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Name' : 'Nama' }}</th>
                                                        <th>Email</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Phone' : 'Nomor HP' }}</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Created at' : 'Dibuat' }}</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Action' : 'Aksi' }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END CONDENSED TABLE -->
                            <!-- END CALLBACK -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
@stop






<!-- Modal Employee Insert -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ Auth::user()->lang == 'en' ? 'Employee Create' : 'Tambah Karyawan' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">{{ Auth::user()->lang == 'en' ? 'First Name' : 'Nama Depan' }}</label>
                            <input type="text" class="form-control @error ('first_name') is-invalid @enderror" id="first_name" name="first_name" aria-describedby="emailHelp" value="{{ old('first_name') }}">

                            @error ('first_name')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ Auth::user()->lang == 'en' ? 'Last Name' : 'Nama Belakang' }}</label>
                            <input type="text" class="form-control @error ('last_name') is-invalid @enderror" id="last_name" name="last_name" aria-describedby="emailHelp" value="{{ old('last_name') }}">

                            @error ('last_name')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect2">{{ Auth::user()->lang == 'en' ? 'Company Name' : 'Nama Perusahaan' }}</label>
                            <select class="form-control" id="company_id" name="company_id">
                            @foreach($listCompany as $idCompany => $company)
                                <option value="{{$idCompany}}">{{ $company }}</option>
                            @endforeach         
                            </select>

                            @error ('company_id')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ Auth::user()->lang == 'en' ? 'Email Address' : 'Alamat Email' }}</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

                            @error ('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ Auth::user()->lang == 'en' ? 'Phone' : 'Nomor HP' }}</label>
                            <input type="text" class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" aria-describedby="emailHelp" value="{{ old('phone') }}">

                            @error ('phone')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ Auth::user()->lang == 'en' ? 'Close' : 'Tutup' }}</button>
                        <button type="submit" class="btn btn-primary">{{ Auth::user()->lang == 'en' ? 'Submit' : 'Kirim' }}</button>
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
        var table = $('#employeeTable').DataTable({
            // processing: true,
            serverSide: true,
            ajax: "{{ route('employee.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'first_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
