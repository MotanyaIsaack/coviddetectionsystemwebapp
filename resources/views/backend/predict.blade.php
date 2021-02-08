@extends('layouts.backend')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="/predict">{{ config('app.name', 'Smart Covid Predictor') }}</a></li>
        <li class="breadcrumb-item">Predict</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Predict COVID-19 <span class='fw-300'></span> <sup class='badge badge-primary fw-500'>WIP</sup>
            {{--            <small>--}}
            {{--                Insert page description or punch line--}}
            {{--            </small>--}}
        </h1>

    </div>
    <div class="modal-body">
        <div id="manage-services" class="panel">
            <div class="panel-hdr color-success-600">
                <h2>
                    UPLOAD IMAGE FOR PREDICTIONS
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form id="upload_test_image_form" action="{{ route('backend.process.predict') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 pl-1">
                                    <div class="form-group mb-0">
                                        <label class="form-label">File (Browser)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image_to_test" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>                                    <div id="name-feedback" class="invalid-feedback">No, you missed this one.</div>
                                </div>
                                <div class="col-3 pl-1">
                                    <div class="row no-gutters">
                                        <button id="submit-service" type="submit" class="btn btn-block btn-success btn-sm mt-4 form-control">{{ __('Predict') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    VIEW PREDICTIONS
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="frame-wrap">
                        <table id="table_user_predictions" class="table m-0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Prediction</th>
                                <th>Prediction Time</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your main content goes below here: -->
    {{--    <div class="row">--}}
    {{--        <div class="col-sm-6 col-xl-3">--}}
    {{--            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">--}}
    {{--                <div class="">--}}
    {{--                    <h3 class="display-4 d-block l-h-n m-0 fw-500">--}}

    {{--                        <small class="m-0 l-h-n">Predictions</small>--}}
    {{--                    </h3>--}}
    {{--                </div>--}}
    {{--                <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@stop
@push('backend-scripts')
    <script>
        $(()=>{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let upload_test_image_form = $('#upload_test_image_form');
            let table_user_predictions = $('#table_user_predictions');
            const user_predictions_datatable = table_user_predictions.DataTable({
                ajax: {
                    url: "{{ route('backend.get_user_predictions_json') }}",
                    dataType:'json',
                    dataSrc: ''
                },
                columns: [
                    {data: 'number'},
                    {data: 'prediction'},
                    {data: 'prediction_time'},
                ]
            });
            upload_test_image_form.on('submit',function (event){
                event.preventDefault()
                let formData = new FormData(this)
                console.log(formData)
                $.ajax({
                    url: '{{route('backend.process.predict')}}',
                    data: formData,
                    type: 'POST',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        let res = JSON.parse(response)
                        console.log(res)
                        if (res.ok === true){
                            toastr["success"](res.msg);
                            user_predictions_datatable.ajax.reload(true);
                            $("#customFile").val(null);
                        }else if(res.ok === false){
                            toastr["error"](res.msg);
                            $("#customFile").val(null);
                        }

                    }
                });
            })


        });

    </script>
@endpush
