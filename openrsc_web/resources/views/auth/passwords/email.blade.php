@extends('template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card bg-transparent border-info">
					<div class="card-header text-center h5">{{ __('Reset Password') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('password.email') }}">
							@csrf

							<div class="form-group row">
								<label for="email"
									   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email"
										   class="small bg-dark border-info text-white-50 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
										   name="email" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
									@if (session('status'))
										<div class="small bg-dark text-white-50" role="alert">
											{{ session('status') }}
										</div>
									@endif
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn-sm w-75 text-center btn-dark btn-outline-info outline-dark">
										{{ __('Send Password Reset Link') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
