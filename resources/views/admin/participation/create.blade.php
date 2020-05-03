@extends('admin.components.layout')

@section('title')
    Add New Participation | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Participation</a></li>
            </ul>
        </div>
    </div><br/><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated slideInUp">
        <div class="col-sm-8 col-sm-offset-2">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Add New Participation</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('participations.manage') }}" class="btn btn-primary pull-right">Manage Participation</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('participations.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Participation Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder=" Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Participation Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="Title">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="desc" class="col-sm-3 control-label">Participation Desc.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="desc" name="desc" value="{{ old('desc') }}" required placeholder="Description">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="year_date" class="col-sm-3 control-label">Participation DateTime</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="year_date" name="year_date" value="{{ old('year_date') }}" required placeholder="year-date">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add Participation</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
