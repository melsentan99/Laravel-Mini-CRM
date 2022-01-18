@extends('layouts.master')


@section('main-menu')
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    

                                    @foreach($employee as $key => $employe)


                                    
                                    <div class="profile-stat">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">{{ Auth::user()->lang == 'en' ? 'Employee Info' : 'Informasi Karyawan' }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>{{ Auth::user()->lang == 'en' ? 'First Name' : 'Nama Depan' }}<span>{{ $employe->first_name }}</span></li>
                                            <li>{{ Auth::user()->lang == 'en' ? 'Last Name' : 'Nama Belakang' }}<span>{{ $employe->last_name }}</span></li>
                                            <li>Email <span>{{ $employe->email }}</span></li>
                                            <li>{{ Auth::user()->lang == 'en' ? 'Phone' : 'Nomor HP' }}<span>{{ $employe->phone }}</span></li>
                                        </ul>
                                        
                                    </div> 

                                    <div class="text-center"><a href="{{ route('employee.edit', $employe->id) }}" class="btn btn-primary">{{ Auth::user()->lang == 'en' ? 'Employee Edit' : 'Ubah Karyawan' }}</a></div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
@stop

