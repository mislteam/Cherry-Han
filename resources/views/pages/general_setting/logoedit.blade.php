@extends('layouts.admin')
@section('content')

<div class="row ch-content">
                <div class="col-lg-12">
                   
                    <div class="ibox product-detail">
                        @include('flash_message')
                        <div class="ibox-title">
                              <h3><?php echo translate('edit_company_setting')?></h3>                             
                        </div>
                         
                        <div class="ibox-content">
                            {{--<form action="{{route('generalsettingUpdate',$row->id)}}" enctype="multipart/form-data" method="post">--}}
                            <form action="{{URL('/generalsetting/update/'.$row->id.'/'.$row->unit)}}" enctype="multipart/form-data" method="post">
                             @csrf
                              
                                     <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                                        <label class="col-md-2 col-form-label"><?php echo translate('name')?></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" value="{{ $row->name }}">
                                            @if($errors->has('name') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('logo') ? 'has-error':'' }}">
                                        <label class="col-form-label col-md-2"><?php echo translate('company_logo') ?></label>
                                        <div class="col-md-6">
                                            <input type="hidden" name="old_logo" value="{{$row->value}}" class="myfrm form-control-file">

                                            <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? 'is-invalid':'' }}">

                                            <br/>
                                            <img class="" src="{{asset('feature/company/'.$row->value)}}" width="200" alt="company_logo">
                                            @if($errors->has('logo') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <span class="float-right">                                              
                                                <button type="submit" class="btn btn-cherryhan"><?php echo translate('save') ?></button>
                                            </span>
                                        </div>
                                    </div>
                                </form> 
                                                         
                        </div>
                       
                        <br>

                    </div>

                </div>
            </div>

@endsection