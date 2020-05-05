@extends('admin.components.layout')

@section('title')
    Update Interest | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Interest</a></li>
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
                            <h3>Update Interest</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('interests.manage') }}" class="btn btn-primary pull-right">Manage Interest</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <form class="form-horizontal" method="POST" action="{{ route('interests.update') }}">
                        @csrf
                        @method('put')


                        <input type="hidden" name="id" value="{{ $interests->id }}">



                        <div class="form-group">
                            <label for="icon" class="col-sm-3 control-label">Interest Percent</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ $interests->icon }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="number" class="col-sm-3 control-label">Interest Number</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="number" name="number" value="{{ $interests->number }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Interest Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $interests->title }}" required >
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Update Interest</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
