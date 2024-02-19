@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5><?php echo translate('user_profile'); ?></h5>
                
            </div>
            <div class="ibox-content">
                <?php $segment1 = Request::segment(1); ?>
                <div class="table-responsive">
                    
                        <table class="table">
                        <thead>
                            <tr>
                                <td class="text-center"><?php echo translate('name') ?></td>
                                <td class="text-center">{{$user->name}}</td>
                            </tr>
                            <tr>
                                 <td class="text-center"><?php echo translate('email') ?></td>
                                 <td class="text-center">{{$user->email}}</td>
                            </tr>
                            <tr>
                                 <td class="text-center"><?php echo translate('role') ?></td>
                                 <td class="text-center"> 
                                 @foreach($user->roles()->pluck('name') as $role)
                                    <span class="badge badge-cherryhan">{{ $role }} </span>
                                @endforeach
                                </td>
                            </tr>
                        </thead>
  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection