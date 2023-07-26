@extends('backend.layouts.app')

@section('topbar')
    @include('backend.picket.ads.layouts.topbar')
@endsection

@section('content')
    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @include('flash')

            </div>
            <div class="clearfix"></div>

            <form action="{{route('advertisement.update', $dataDb->advertisement_id)}}" method="post"
                  enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{method_field('PUT')}}
                @include('backend.picket.ads.layouts.sidebar')


                <div class="tray col-md-9">

                    <!-- Search Results Panel  -->
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title text-muted hidden-xs">Form Edit Advertise</span>

                        </div>

                        <div class="panel-heading">
                            <ul class="nav panel-tabs-border panel-tabs panel-tabs-right">
                                <li class="active">
                                    <a href="#default" data-toggle="tab">Data Ads</a>
                                </li>
                                <li>
                                    <a href="#image" data-toggle="tab">Images Ads</a>
                                </li>
                                <li>
                                    <a href="#customer" data-toggle="tab">Data Customer</a>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-body ph20">
                            <div class="tab-content pn br-n">
                                <div id="default" class="tab-pane active">
                                    <div class="row @if($errors->has('title')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="title" class="control-label">Title
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="title" id="title"
                                                       value="{{old('title', $dataDb->title)}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('title', '<em for="title" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('startDate')) has-error @endif @if($errors->has('endDate')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="startDate" class="control-label">Start Date
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm date">
                                                    <input type="text" name="startDate" id="startDate"
                                                           value="{{old('startDate', $dataDb->start_date)}}"
                                                           class="form-control input-sm" placeholder="Start Date ...*"
                                                           readonly>
                                                    <label class="input-group-addon input-sm" for="startDate">
                                                        <i class="fa fa-calendar"></i>
                                                    </label>
                                                </div>
                                                {!! $errors->first('startDate', '<em for="startDate" class="text-danger">:message</em>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="endDate" class="control-label">End Date
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm date">
                                                    <input type="text" name="endDate" id="endDate"
                                                           value="{{old('endDate', $dataDb->end_date)}}"
                                                           class="form-control input-sm" placeholder="End Date ...*"
                                                           readonly>
                                                    <label class="input-group-addon input-sm" for="endDate">
                                                        <i class="fa fa-calendar"></i>
                                                    </label>
                                                </div>
                                                {!! $errors->first('endDate', '<em for="endDate" class="text-danger">:message</em>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <p id="countDayAds"></p>
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('price')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="price" class="control-label">Price
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="price" id="price"
                                                       value="{{old('price', $dataDb->price->price)}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('price', '<em for="price" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <!-- medsos-->

                                    <div class="row @if($errors->has('facebook')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="facebook" class="control-label">Facebook</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="facebook" id="facebook"
                                                       value="{{old('facebook', isset($medsos['facebook']) ? $medsos['facebook'] : '' )}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('facebook', '<em for="facebook" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('instagram')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="instagram" class="control-label">Instagram</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="instagram" id="instagram"
                                                       value="{{old('instagram', isset($medsos['instagram']) ? $medsos['instagram'] : '' )}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('instagram', '<em for="instagram" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('twitter')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="twitter" class="control-label">Twitter</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="twitter" id="twitter"
                                                       value="{{old('twitter', isset($medsos['twitter']) ? $medsos['twitter'] : '' )}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('twitter', '<em for="twitter" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('web')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="web" class="control-label">Web</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="web" id="web"
                                                       value="{{old('web', isset($medsos['web']) ? $medsos['web'] : '' )}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('web', '<em for="web" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('whatsapp')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="whatsapp" class="control-label">Whatsapp</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="whatsapp" id="whatsapp"
                                                       value="{{old('whatsapp', isset($medsos['whatsapp']) ? $medsos['whatsapp'] : '' )}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('whatsapp', '<em for="whatsapp" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <!-- end medsos-->

                                    <div class="form-group @if($errors->has('desc')) has-error @endif">
                                        <label for="desc" class="control-label">Desc
                                            <span style="color: red">*</span></label>

                                        <textarea id="summernote" name="desc" id="desc" cols="24" rows="10"
                                                  class="form-control">{!! old('desc', $dataDb->desc) !!}</textarea>
                                        {!! $errors->first('desc', '<em for="desc" class="text-danger">:message</em>') !!}
                                    </div>

                                </div>
                                <div id="image" class="tab-pane">
                                    <div class="mix label1 folder1">
                                        <div class="panel p12 pbn">
                                            <div class="of-h">
                                                <img src="{{ $dataDb->img_url }}" class="img-responsive"
                                                     style="width: 450px; height: 350px;">
                                                <div class="row table-layout">
                                                    <div class="col-xs-12 va-m pln">
                                                        <h6>{{ array_last(explode('/',$dataDb->img_url)) }} <code>{existing
                                                                photo}</code></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row @if($errors->has('file')) has-error @endif">
                                        <div class="col-md-12">
                                            <div class="form-group" id="show-for-input-file">
                                                <input id="file" type="file" name="file[]"
                                                       data-overwrite-initial="false" multiple accept="image/*">
                                                <input type="hidden" name="img_url_old" value="{{ $dataDb->img_url }}">
                                            </div>
                                            {!! $errors->first('file', '<em for="file" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="customer" class="tab-pane">
                                    <div class="row @if($errors->has('customer.name')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="customer[name]" class="control-label">Customer Name
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="customer[name]" id="customer[name]"
                                                       value="{{old('customer.name', $dataDb->customer->name)}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('customer.name', '<em for="title" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('customer.email')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="customer[email]" class="control-label">Customer Email
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="customer[email]" id="customer[email]"
                                                       value="{{old('customer.email', $dataDb->customer->email)}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('customer.email', '<em for="title" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('customer.phone')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="customer[phone]" class="control-label">Customer Phone
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" name="customer[phone]" id="customer[phone]"
                                                       value="{{old('customer.phone', $dataDb->customer->phone)}}"
                                                       class="form-control input-sm">
                                            </div>
                                            {!! $errors->first('customer.phone', '<em for="title" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>

                                    <div class="row @if($errors->has('customer.address')) has-error @endif">
                                        <div class="col-md-3">
                                            <label for="customer[address]" class="control-label">Customer Address
                                                <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea name="customer[address]" id="customer[address]" cols="24"
                                                          rows="2"
                                                          class="form-control">{!! old('customer.address', $dataDb->customer->address) !!}</textarea>
                                            </div>
                                            {!! $errors->first('customer.address', '<em for="customer.address" class="text-danger">:message</em>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <input type="hidden" value="{{old('previousUrl', url()->previous())}}" name="previousUrl">
                            <a href="{{old('previousUrl', url()->previous())}}" class="btn btn-flat btn-default btn-sm"><i
                                        class="fa fa-reply"></i> @lang('global.cancel')
                            </a>

                            <div class="pull-right">
                                <button type="submit" class="btn ladda-button btn-success btn-sm" data-style="zoom-in">
                                    <span class="ladda-label"><i class="fa fa-save"></i> {{__('global.update')}}</span>
                                    <span class="ladda-spinner"><div class="ladda-progress"
                                                                     style="width: 0px;"></div></span>
                                </button>
                            </div>
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
    <link rel="stylesheet" href="{{url('plugins/bootstrap-fileinput/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{url('plugins/bootstrap-fileinput/themes/wew/theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css">

@endpush

@push('scripts')

    {{--For Upload Image--}}
    <script src="{{url('plugins/bootstrap-fileinput/js/fileinput.js')}}"></script>
    <script src="{{url('plugins/bootstrap-fileinput/themes/wew/theme.js')}}"></script>

    <script>

        $(function () {
            $('#startDate, #endDate').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0"
            });
        });

        var footerTemplate = '<td class="file-details-cell"><div class="wew-caption" title="{caption}">{caption}</div> ' +
            '{size}{progress}</td><td class="file-actions-cell">{actions}</td>';

        var zoomCacheTemplate = '<tr style="display:none" class="kv-zoom-cache-theme"><td>' +
            '<table class="kv-zoom-cache"></table></td></tr>';

        var actionTemplate = '<div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
            '{drag}\n' +
            '<div class="file-actions">\n' +
            '    <div class="file-footer-buttons">\n' +
            '        {delete}  ' +
            '    </div>\n' +
            '</div>';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#file').fileinput({
            theme: 'wew',
            {{--uploadUrl: "{{route('advertisement.upload.image')}}", // server upload action--}}
            minFileCount: 0,
            maxFileCount: 1,
            showUpload: false,
            showRemove: false,
            required: true,
            allowedFileExtensions: ["jpg", "png", "gif"],
            layoutTemplates: {
                actions: actionTemplate,
                zoomCache: zoomCacheTemplate,
                footer: footerTemplate,
                size: '<samp><small>({sizeText})</small></samp>'
            },
            @if(old('image_url') && count(old('image_url')) > 0)
            initialPreview: [
                @for($i = 0; $i < count(old('image_url')); $i++)
                    "<img src='{{url('storage/' . old('image_url.' . $i))}}' style='height:100px' ><input type='hidden' name='image_url[]' value='{{old('image_url.' . $i)}}' >",
                @endfor
            ],
            @endif

                    @if(old('image_url') && count(old('image_url')) > 0)
            initialPreviewConfig: [
                    @for($i = 0; $i < count(old('image_url')); $i++)
                {
                    {{--caption: "{{old('image_url.' . $i)}}", key: '{{old('image_url.' . $i)}}', url: '{{route('advertisement.image.destroy')}}'--}}
                },
                @endfor
            ],
            @endif
        }).on("filebatchselected", function (event, files) {
            // trigger upload method immediately after files are selected
            $('#file').fileinput("upload");
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Content',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "underline", "clear"]],
                    ["fontname", ["fontname"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link", "hr", "video", "picture"]],
                    ["view", ["fullscreen", "codeview", "help"]]
                ]
            });

            function getCountDay(start, end) {
                let start_date = new Date($('#startDate').val());
                let end_date = new Date($('#endDate').val());

                // calculate time
                let diff_time = end_date.getTime() - start_date.getTime();

                // calculate days between two days
                let countDay = diff_time / (1000 * 3600 * 24);

                return countDay;
            }

            $('#countDayAds').text(getCountDay($('#startDate').val(), $('#endDate').val()) + ' Days');

            $('#startDate, #endDate').on('change', function () {
                $('#countDayAds').text(getCountDay($('#startDate').val(), $('#endDate').val()) + ' Days');
            });

            // the selector will match all input controls of type :checkbox
            // and attach a click event handler
            $("input:checkbox").on('click', function () {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    var group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                } else {
                    $box.prop("checked", false);
                }
            });
        })
    </script>

@endpush
