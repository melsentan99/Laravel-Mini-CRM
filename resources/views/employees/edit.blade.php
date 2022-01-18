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

                                
                              
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">{{ Auth::user()->lang == 'en' ? 'Employee Info' : 'Informasi Karyawan' }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>{{ Auth::user()->lang == 'en' ? 'Name' : 'Nama' }} <span>-</span></li>
                                            <li>Email <span>-</span></li>
                                            <li>Website <span>-</span></li>
                                        </ul>
                                        
                                    </div> 

                                    
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method='post'> 
                                        @method('delete') 
                                        @csrf
                                        <button class="text-center" type='submit'><a class='btn btn-danger'>{{ Auth::user()->lang == 'en' ? 'Employee Delete' : 'Delete Karyawan' }}</a></button>
                                    </form>
                                </div>
                                
                                
                            </div>
                            
                            <div class="profile-right">
                                <h4 class="heading">{{ Auth::user()->lang == 'en' ? 'Employee Edit' : 'Ubah Karyawan' }}</h4>

                                <form action="{{ route('employee.update', ['employee' => $employee->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="first_name">{{ Auth::user()->lang == 'en' ? 'First Name' : 'Nama Depan' }}</label>
                                            <div class="col-md-12 col-sm-12">
                                                
                                                <input type="text" class="form-control @error ('first_name') is-invalid @enderror" id="first_name" name="first_name" aria-describedby="emailHelp" value="{{ $employee->first_name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="name">{{ Auth::user()->lang == 'en' ? 'Last Name' : 'Nama Belakang' }}</label>
                                            <div class="col-md-12 col-sm-12">
                                                
                                                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="last_name" name="last_name" aria-describedby="emailHelp" value="{{ $employee->last_name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="exampleFormControlSelect2">{{ Auth::user()->lang == 'en' ? 'Company Name' : 'Nama Perusahaan' }}</label>
                                            <select class="form-control" id="company_id" name="company_id">
                                            @foreach($listCompany as $idCompany => $company)
                                                <option value="{{$idCompany}}">{{ $company }}</option>
                                            @endforeach         
                                            </select>
                                        </div>

                                        <div class="row">
                                            <label for="email">Email</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ $employee->email }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="phone">{{ Auth::user()->lang == 'en' ? 'Phone' : 'Nomor HP' }}</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" aria-describedby="emailHelp" value="{{ $employee->phone }}">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ Auth::user()->lang == 'en' ? 'Update!' : 'Ubah!' }}</button>

                                </form>
                                
                            

                            </div>
                            <!-- END RIGHT COLUMN -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
@stop




