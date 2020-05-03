@extends('admin.components.layout')

@section('title')
    Update Slider | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Slider</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated shake">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Update Slider</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('sliders.manage') }}" class="btn btn-primary pull-right">Manage Slider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('sliders.update',$slider->id) }}" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $slider->title }}" required placeholder="Slider Title">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="sub_title" class="col-sm-3 control-label">Sub Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $slider->sub_title }}" required placeholder="Sub Title">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="short_desc" class="col-sm-3 control-label">Short Desc</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="short_desc" name="short_desc" value="{{ $slider->short_desc}}" required placeholder="short_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="start" name="start" value="{{ $slider->start }}" required placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-3 control-label">End Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="end" name="end" value="{{ $slider->end }}" required placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value="{{ $slider->image }}" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
