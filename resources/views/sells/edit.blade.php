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
                                        <h4 class="heading">{{ trans('sells.info'); }}</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Item<span>{{ $sell->item }}</span></li> 
                                            <li>Price <span>{{ $sell->price }}</span></li>
                                            <li>Discount <span>{{ $sell->discount }}</span></li>
                                            <li>Employee <span>{{ $sell->employee }}</span></li>                            
                                            <li>Created Date <span>{{ $sell->created_date }}</span></li>  
                                        </ul>   
                                    </div> 
       
                                    <form action="{{ route('sells.destroy', $sell->id) }}" method='post'> 
                                        @method('delete') 
                                        @csrf
                                        <button class="text-center" type='submit'><a class='btn btn-danger'>{{ trans('sells.delete'); }}</a></button>
                                    </form>
                                </div>
                                
                                
                            </div>
                            
                            <div class="profile-right">
                                <h4 class="heading">{{ trans('sells.edit'); }}</h4>

                                <form action="{{ route('sells.update', ['sell' => $sell->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="awards">
                                        <div class="row">
                                            <label for="item">Item</label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" id="item" name="item">
                                                    @foreach($listItem as $idItem => $item)
                                                    <option value="{{ $idItem }}" class="form-control">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="price">Price</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" aria-describedby="emailHelp" value="{{ $sell->price }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="discount">Discount</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control @error ('discount') is-invalid @enderror" id="discount" name="discount" aria-describedby="emailHelp" value="{{ $sell->discount }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="employee">Employee</label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" id="employee" name="employee">
    				                            @foreach($listEmployee as $idEmployee => $employee)
    				                            	<option value="{{$idEmployee}}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
    				                            @endforeach
                                                </select>
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




