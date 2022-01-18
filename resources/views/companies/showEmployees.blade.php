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
                            <!-- CONTEXTUAL -->
                                <h2 class="text-center">{{ Auth::user()->lang == 'en' ? 'Employee List' : 'Datar Karyawan' }}</h2>

                                
                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">
                                            <!-- Button trigger modal -->
                                            <button href="{{ route('company.index') }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                              {{ Auth::user()->lang == 'en' ? 'Back' : 'Kembali' }}
                                            </button>

                                        </div>
                                        @if ($company->employee->count())
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="employeeTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Name' : 'Nama' }}</th>
                                                        <th>Email</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Phone' : 'Nomor HP' }}</th>
                                                        <th>{{ Auth::user()->lang == 'en' ? 'Action' : 'Aksi' }}</th>
                                                    </tr>
                                                </thead>
                                            @foreach ($company->employee as $employee)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $employee->first_name }}</td>
                                                        <td>{{ $employee->last_name }}</td>
                                                        <td>{{ $employee->email }}</td>
                                                        <td>{{ $employee->phone }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endforeach
                                        </div>
                                        @endif
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

@foreach($employee as $key => $employe)
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#employeeTable').DataTable({
            // processing: true,
            serverSide: true,
            
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'first_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endforeach
