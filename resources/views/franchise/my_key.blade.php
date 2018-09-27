@extends('admin_master')

@section('title','List of Keys')

@section('content')
    <div class="row box_containner">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="dash_boxcontainner white_boxlist">
                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         List of Keys
                        <button onclick="add_frn()" class="btn btn-default pull-right"><i
                                    class="mdi mdi-plus"></i>Add</button>
                      </span>
                    <table id="example" class="table table-bordered dataTable table-striped" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="bg-info">
                            <th>Key</th>
                            <th>Assigned to</th>
                            <th>Remaining</th>
                            <th>Active Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($keys)>0)
                            @foreach($keys as $key)
                                <tr>
                                    <td>{{$key->key_name}}</td>
                                    <td>{{isset($key->franchise_id)?$key->franchise->name:'N/A'}}</td>
                                    <td>{{isset($key->franchise_id)?$key->remaining:'N/A'}}</td>
                                    <td>
                                        @if($key->is_active == 1)
                                            <p class="bg-success">Active</p>
                                        @else
                                            <p class="bg-danger">Inactive</p>

                                        @endif
                                    </td>
                                    {{--<td> {{ date_format(date_create($key->last_login), "d-M-Y h:i A")}}</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
