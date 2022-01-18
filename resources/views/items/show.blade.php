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
                                    

                                    @foreach($items as $data)

                                    <div class="profile-stat">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h1></h1>
                                        <h4 class="heading">{{ trans('items.info'); }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>Name<span>{{ $data->name }}</span></li>
                                            <li>Email <span>{{ $data->price }}</span></li>
                                            
                                        </ul>
                                        
                                    </div> 


                                    <div class="text-center"><a href="{{ route('items.edit', $data->id) }}" class="btn btn-primary">{{ trans('items.edit'); }}</a></div>
                                @endforeach
                                </div>     

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
@stop


