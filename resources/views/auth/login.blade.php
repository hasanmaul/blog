@extends('app')

@section('content')
<div class="login-from blok-shadow"
	style="width:300px;margin:50px auto;padding:10px;">
	<form method="POST" action="{{ url('auth/login') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h1 class="text-light">Sign In</h1>
		<hr class="thin">
		<br>

						<div class="form-group">
							<label class="col-md-4 control-label">User email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Login
								</button>

								<a href="/password/email">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
