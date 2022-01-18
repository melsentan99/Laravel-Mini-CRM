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
                                    

                                    @foreach($sell as $data)

                                    <div class="profile-stat">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h1></h1>
                                        <h4 class="heading">{{ trans('sells.info'); }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>Item<span>{{ $data->item }}</span></li>
                                            <li>Price<span>{{ $data->price }}</span></li>
                                            <li>Discount<span>{{ $data->price }}</span></li>
                                            @foreach($sell2 as $data)
                                            <li>Employee<span>{{ $data->first_name }} {{ $data->last_name }}</span></li>
                                            @endforeach
                                            <li>Created Date<span>{{ $data->created_date }}</span></li>
                                        </ul>
                                        
                                    </div> 


                                    <div class="text-center"><a href="{{ route('sells.edit', $data->id) }}" class="btn btn-primary">{{ trans('sells.edit'); }}</a></div>
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


