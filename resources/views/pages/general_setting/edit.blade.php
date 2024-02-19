@extends('layouts.admin')
@section('content')

<div class="row ch-content">
                <div class="col-lg-12">
                   
                    <div class="ibox product-detail">
                        @include('flash_message')
                        <div class="ibox-title">
                              <h3><?php echo translate('edit_general_setting')?></h3>                             
                        </div>
                         
                        <div class="ibox-content">
                            {{--<form action="{{route('generalsettingUpdate',$row->id)}}" enctype="multipart/form-data" method="post">--}}
                            <form action="{{URL('/generalsetting/update/'.$row->id.'/'.$row->unit)}}" enctype="multipart/form-data" method="post">
                             @csrf
                              
                                     <div class="form-group row {{ $errors->has('value') ? 'has-error':'' }}">
                                        <label class="col-md-2 col-form-label">
                                            {{$row->name}} 
                                            @if($row->unit=='kyats')
                                               point
                                            @else

                                            @endif
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="value" class="form-control" value="{{ $row->value }}">
                                            @if($errors->has('value') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('value') }}</span>
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