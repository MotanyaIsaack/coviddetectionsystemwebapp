@extends('layouts.backend')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">{{ config('app.name', 'Tribore Health') }}</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-home'></i> Dashboard <span class='fw-300'></span> <sup class='badge badge-primary fw-500'>WIP</sup>
{{--            <small>--}}
{{--                Insert page description or punch line--}}
{{--            </small>--}}
        </h1>

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
    <div class="modal-body">
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
                        <table id="table_predictions" class="table m-0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>

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
@stop
