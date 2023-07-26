@extends('backend.layouts.app')

@section('topbar')
    @include('backend.picket.ads.layouts.topbar')

    <style>
        .form-control::placeholder {
            opacity: 0.5;
        }
    </style>
@endsection

@section('content')
    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @include('flash')

            </div>
            <div class="clearfix"></div>

            <form action="{{route('picket.store')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="tray col-md-12">

                    <!-- Search Results Panel  -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title text-muted hidden-xs">Form Create Picket</span>

                        </div>

                        <div class="panel-heading">
                            <ul class="nav panel-tabs-border panel-tabs panel-tabs-right">
                                <li class="active">
                                    <a href="#default" data-toggle="tab">Data Picket</a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body ph20">
                            <div class="tab-content pn br-n">
                                <div id="default" class="tab-pane active">
                                    <div class="row @if($errors->has('date_picket')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="date_picket" class="control-label">Date Picket
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm date">
                                                    <input type="text" name="date_picket" id="date_picket"
                                                           value="{{old('date_picket', date('Y-m-d'))}}"
                                                           class="form-control input-sm" placeholder="Start Date ...*"
                                                           readonly>
                                                    <label class="input-group-addon input-sm" for="date_picket">
                                                        <i class="fa fa-calendar"></i>
                                                    </label>
                                                </div>
                                                {!! $errors->first('date_picket', '<em for="date_picket" class="text-danger">:message</em>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="control-label">- Group Picket -</label>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="control-label">Piket Hadir</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">: A</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="control-label">Cadangan Piket</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">: B</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="control-label">Lepas Piket</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label">: C</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($checkDateSchedulePicket != null)
                                                        <div class="w-100 text-center border-primary shadow-lg border">
                                                            <h1>Data Absen Hari Ini Telah di SUBMIT</h1></div>
                                                    @else
                                                        <table
                                                            class="table table-striped table-bordered table-hover table-condensed table-responsive display nowrap"
                                                            id="users-table" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>Jabatan</th>
                                                                <th>Status picket</th>
                                                                <th>Keterangan picket</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($members as $member)
                                                                <tr class="w-100">
                                                                    <th>
                                                                        {{$member->name}}
                                                                        <input name="member[]" type="hidden"
                                                                               value="{{$member->id}}, {{$member->name}}">
                                                                    </th>
                                                                    <th>Anggota</th>
                                                                    <th><select name="status_picket[]"
                                                                                class="form-control input-sm"
                                                                                style="width: 100% !important;"
                                                                                data-placeholder="select a status picket"
                                                                                tabindex="4">

                                                                            <option selected="selected"></option>
                                                                            <option class="text-capitalize"
                                                                                    value="A, piket hadir">piket
                                                                                hadir
                                                                            </option>
                                                                            <option class="text-capitalize"
                                                                                    value="B, cadangan piket">cadangan
                                                                                piket
                                                                            </option>
                                                                            <option class="text-capitalize"
                                                                                    value="c, lepas piket">lepas
                                                                                piket
                                                                            </option>
                                                                        </select></th>
                                                                    <th><input type="text" name="desc_picket[]"
                                                                               class="form-control input-sm"
                                                                               placeholder="ket. izin/sakit/dll"
                                                                               value="" tabindex="1"></th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <input type="hidden" value="{{old('previousUrl', url()->previous())}}"
                                           name="previousUrl">
                                    <a href="{{old('previousUrl', url()->previous())}}"
                                       class="btn btn-flat btn-default btn-sm"><i
                                            class="fa fa-reply"></i> @lang('global.cancel')
                                    </a>
                                    @if($checkDateSchedulePicket == null)
                                        <div class="pull-right">
                                            <button type="submit" class="btn ladda-button btn-success btn-sm"
                                                    data-style="zoom-in">
                                                <span class="ladda-label"><i class="fa fa-save"></i> {{__('global.save')}}</span>
                                                <span class="ladda-spinner"><div class="ladda-progress"
                                                                                 style="width: 0px;"></div></span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>


                            </div>

                        </div>

                        <div class="clearfix"></div>
            </form>

        </div>

    </section>
@endsection

@push('css')
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2-bootstrap.css')}}">
@endpush

@push('scripts')
    <script src="{{url('plugins/select2/js/select2.full.js')}}"></script>

    <script>

        $(function () {
            $('#date_picket, #endDate').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0"
            });

            $('form select').select2({
                theme: "bootstrap",
                placeholder: "Select",
                containerCssClass: ':all:',
            });
        });
    </script>

@endpush
