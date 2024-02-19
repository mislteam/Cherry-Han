@extends('layouts.2app')

@section('content')
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center mb-4 " >
					{{--<img src="{{ asset('images/logo/cherryhan-logo.png') }}" class="ch-logo" alt="<?php echo translate('cherry_han_logo_image') ?>">--}}
				    <img src="{{ asset('feature/company/'.$company->value)}}" class="ch-logo" alt="<?php echo translate('cherry_han_logo_image') ?>">
				</div>
				<div class="col-md-12 login-wrap text-center mb-2">
					<h3 class="mb-2 text-center"><?php echo translate('online_general_service_system') ?></h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input id="email" type="email" placeholder="<?php echo translate('email_address') ?>" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		      		</div>
	            <div class="form-group">
	              <input type="password" id="password-field"  placeholder="<?php translate('password') ?>" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password field-icon text-dark"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	            </div>
	            <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3"><?php echo translate('login') ?></button>
	            </div>	            
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection
