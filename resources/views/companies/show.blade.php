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
                                    <div class="profile-main">

                                    @foreach($company as $key => $comp)


                                        <img src="{{ asset('/storage/images/'. $comp->logo) }}" alt="Avatar" style="width:100px; height: 100px;">
                                        <h3 class="name">{{ $comp->name }}</h3>
                                    </div>
                                    <div class="profile-stat">
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">{{ Auth::user()->lang == 'en' ? 'Company Info' : 'Info Perusahaan' }}</h4>
                                
                                        <ul class="list-unstyled list-justify">
                                            <li>{{ Auth::user()->lang == 'en' ? 'Name' : 'Nama' }} <span>{{ $comp->name }}</span></li>
                                            <li>Email <span>{{ $comp->email }}</span></li>
                                            <li>Website <span>{{ $comp->website }}</span></li>
                                            <li>Token 
                                                <span class="col-sm-8" style="word-wrap: break-word;">
                                                    @if ($comp->token) {{ $comp->token }}
                                                    @else
                                                        <button id="generate_token" company_id="{{ $comp->id }}">Generate</button>
                                                    @endif
                                                </span>
                                            </li>
                                        </ul>
                                        
                                    </div> 


                                    <div class="text-center"><a href="{{ route('company.edit', $comp->id) }}" class="btn btn-primary">{{ Auth::user()->lang == 'en' ? 'Company Edit' : 'Edit Perusahaan' }}</a></div>
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




<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>



<script>
    $(document).ready(function () {
        $('#generate_token').click(function() {
            $.get('/token/' + $(this).attr('company_id'))
        });
    });
</script>