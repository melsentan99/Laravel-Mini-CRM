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

                                    <ul>
                                        <ul class="col-md-2 col-md-offset-5 text-right">
                                            <strong>{{ Auth::user()->lang == 'en' ? 'Select Language' : 'Pilih Bahasa' }}</strong>
                                        </ul>
                                        <ul class="col-md-2">
                                            <select class="form-control Langchange">
                                                <option value="1" {{ Auth::user()->lang == 'en' ? 'selected' : '' }}>English</option>
                                                <option value="2" {{ Auth::user()->lang == 'id' ? 'selected' : '' }}>Indonesia</option>
                                            </select>
                                        </ul>
                                    </ul>


         


                                            
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




<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".LangChange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>


@stop


