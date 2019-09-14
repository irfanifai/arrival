@extends('front.app')

@section("title") Contact @endsection

@section('content')
<div class="contact">
	<div class="container">
        <h3>Kontak Kami</h3>

            @if (session('status'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('status') }}</strong>
            </div>
            @endif

			<div class="contact-main">
				<div class="contact-top">
					<div class="col-md-6 contact-top-left">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3360290349!2d106.81179081424763!3d-6.219343462644583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6acacf931b1%3A0xdf98ff9897bd3032!2sJl.%20Jend.%20Sudirman%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sen!2sid!4v1567341536553!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0"></iframe>
					</div>
					<div class="col-md-6 contact-top-right">
						<div class="contact-textarea">
                            {!! Form::open(['route' => 'contact.store', 'method' => 'POST']) !!}
                            @csrf
								{!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Nama Lengkap', 'required']) !!}
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                {!! Form::text('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Alamat Email', 'required']) !!}
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                {!! Form::textarea('message', null, ['id' => 'textarea', 'class' => $errors->has('message') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Pesan', 'required']) !!}
                                @if ($errors->has('message'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
								<input type="submit" value="Kirim">
								<input type="reset" value="Hapus">
							{!! Form::close() !!}
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
