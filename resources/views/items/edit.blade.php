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
                                        <h4 class="heading">{{ trans('items.info'); }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>Name<span>{{ $item->name }}</span></li>
                                            <li>Price <span>{{ $item->price }}</span></li>
                                        </ul>
                                        
                                    </div> 

                                    
                                    <form action="{{ route('items.destroy', $item->id) }}" method='post'> 
                                        @method('delete') 
                                        @csrf
                                        <button class="text-center" type='submit'><a class='btn btn-danger'>{{ trans('items.delete'); }}</a></button>
                                    </form>
                                </div>
                                
                                
                            </div>
                            
                            <div class="profile-right">
                                <h4 class="heading">{{ trans('items.edit'); }}</h4>

                                <form action="{{ route('items.update', ['item' => $item->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="awards">
                                        <div class="row">
                                            <label for="name">Name</label>
                                            <div class="col-md-12 col-sm-12">
                                                
                                                <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ $item->name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="price">Price</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" aria-describedby="emailHelp" value="{{ $item->price }}">
                                            </div>
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




