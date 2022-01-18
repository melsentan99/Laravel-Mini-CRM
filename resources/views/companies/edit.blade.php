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

                                    <div class="profile-stat">
                                        <div class="row">
  
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">{{ trans('validation.compnay_info'); }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>Name<span>{{ $company->name }}</span></li>
                                            <li>Email <span>{{ $company->email }}</span></li>
                                            <li>Website <span>{{ $company->website }}</span></li>
                                        </ul>
                                        
                                    </div> 

                                    
                                    <form action="{{ route('company.destroy', $company->id) }}" method='post'> 
                                        @method('delete') 
                                        @csrf
                                        <button class="text-center" type='submit'><a class='btn btn-danger'>{{ trans('validation.company_delete'); }}</a></button>
                                    </form>
                                </div>
                                
                                
                            </div>
                            
                            <div class="profile-right">
                                <h4 class="heading">{{ trans('validation.company_edit'); }}</h4>

                                <form action="{{ route('company.update', ['company' => $company->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="awards">
                                        <div class="row">
                                            <label for="name">Name</label>
                                            <div class="col-md-12 col-sm-12">
                                                
                                                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ $company->name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="email">Email</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ $company->email }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="website">Website</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('website') is-invalid @enderror" id="website" name="website" aria-describedby="emailHelp" value="{{ $company->website }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-md-12"></div>
                                            <label for="logo">Logo</label>
                                            <input type="file" class="form-control" id="logo" name="logo" aria-describedby="emailHelp" value="{{ $company->logo }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>

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




