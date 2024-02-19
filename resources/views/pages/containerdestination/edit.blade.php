@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('edit_container_destination'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('containerdestinationIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('containerdestinationUpdate', $containerdestination->id) }}" method="post">
                        @csrf
                         <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class=" col-form-label"><?php echo translate('container_destination_name_*'); ?></label>
                            <div class="">
                                <input type="text" name="name" value="{{$containerdestination->name}}" placeholder="<?php echo translate('placehoder_destination_name') ?>" class="form-control" required>
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo translate('state')?></label>
                            <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')">
                              
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" <?php if ($state->id==$containerdestination->state_id):echo "selected"; ?>
                                        
                                    <?php endif ?>>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('containerdestinationIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
                                    <button type="submit" class="btn btn-cherryhan"><?php echo translate('save') ?></button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
