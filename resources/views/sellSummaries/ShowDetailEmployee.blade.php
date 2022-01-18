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

                                <h2 class="text-center">{{ trans('items.list'); }}</h1></h2>

                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">
                                            <!-- Button trigger modal -->
                                            <!-- <form action="{{ route('sellsummary.show') }}" -->
                                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                                Back
                                            </a>
                                            
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Employee</th>
                                                        <th>Item</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Created Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; $total_price=0; $total_discount=0; $total=0?> 
                                                    @foreach ($sells as $data)   
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>Rp <?php echo number_format( $data->price, 0, ', ', '.' ) ?></td>
                                                        <td>{{ $data->discount }}%</td>
                                                        <td>{{ $data->created_date }}</td>
                                                    </tr>
                                                        <?php $total_price += $data->price_total ?>
                                                        <?php $total_discount += $data->discount_total ?>
                                                        <?php $total += $data->total ?>

                                                    @endforeach
                                                </tbody>
                                            </table>
<!--                                                     <?php $no = 1; ?> 
                                                    @foreach ($sells_summaries as $data)
                                                <tr>

                                                    <h4><b>Total = Rp. <?php echo number_format($data->total , 0, ',', '.') ?></b></h4>
                                                </tr>
                                                    @endforeach -->
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>      
@stop




