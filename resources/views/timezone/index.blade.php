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
                                <h2 class="text-center">{{ __('sidebar.changeTimezone') }}</h2>

                                
                                    <!-- CONDENSED TABLE -->
                                    <div class="panel">
                                        <div class="col-6">

                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-condensed table-hover" id="employeeTable">
                                            @if ($timezones->count())
                                            <div class="form-group">
                                                <label for="">Timezone</label>
                                                <select class="form-control changeTimezone">
                                                    @foreach ($timezones as $timezone)
                                                        <option value="{{$timezone->name}}" {{$timezone->name == Auth::user()->timezone ? 'selected' : ''}}>{{$timezone->time}}</option>


                                                    @endforeach
                                                </select>
                                            </div>




                                            <!-- @foreach ($timezones as $timezone)
                                            <td>{{ $timezone->created_at->timezone(auth()->user()->timezone)->format('d/m/y H:i'); }}</td>
                                            @endforeach -->
                                            @endif
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END CONDENSED TABLE -->
                            <!-- END CALLBACK -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var url = "{{ route('setTimeZone') }}"
    $('.changeTimezone').change(function() {
        window.location.href = url + "?timezone="+$(this).val();
    })
</script>




@stop


