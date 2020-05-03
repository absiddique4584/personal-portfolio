@extends('admin.components.layout')

@section('title')
    Add New Expertise | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Expertise</a></li>
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
                            <h3>Add New Expertise</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('expertises.manage') }}" class="btn btn-primary pull-right">Manage Expertise</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('expertises.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label"> Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder=" Expertise Title">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="number" class="col-sm-3 control-label">Number</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}" required placeholder="Expertise Number">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add Expertise</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
