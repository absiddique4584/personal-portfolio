@extends('admin.components.layout')

@section('title')
    Manage Message | Portfolio
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Message</a></li>
            </ul>
        </div>
    </div><br/><br/>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12  ">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Message</h3>
                        </div>

                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{ substr($message->subject,0,18)}}</td>
                                    <td>{{ substr($message->comments,0,18)}}</td>

                                    <td>
                                        <a href="{{ route('messages.delete', base64_encode($message->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
