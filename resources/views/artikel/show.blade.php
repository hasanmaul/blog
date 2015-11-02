@extends('app')

@section('content')

	<div class="panel">
		<div class="heading">
			<div class="icon mif-file-text"></div>
			<div class="title">{{ $data->judul }}</div>
		</div>
		<div class="content">
			{{ $data->isi }}

		<div class="place-right">
			<span class="mif-calender"></span>
			{{ date_format(date_create($data->created_at),"D,d M Y H i s") }}
				<span class="mif-user"></span>
				{{ App\User::find($data->idpengguna)->first()['name'] }}
			</div>

		</div>
	</div>

	<div class="panel">
		<div class="heading">
			<div class="icon mif-file-bubbles"></div>
			<div class="title">Comment</div>
		</div>
		<div class="content">
		@if(Auth::check())
			<div id="form">
				<span style="margin: 50px auto;" class="mif-spinner3 mif-ani-spin" style="padding:50px; font-size:50pt; "></span>
			</div>
			@endif
			<div id="komentar"></div>
				<span style="margin: 50px auto;" class="mif-spinner3 mif-ani-spin" style="padding:50px; font-size:50pt; "></span>
		</div>
	</div>

	@endsection

	@section('footer')

			<script type="text/javascript">

				setTimeout(function(){

			$("#form").html(
				'<table style="width:100%">'+
				'<table>'+
					'<tr>'+
					'<td>'+
						'<div class="input-control text">'+
							'<input id="input_komentar" type="text">'+
						'</div>'+
					'</td>'+
				'</tr>'+
				'<tr>'+
					'<td>'+
						'<button class="button" onclick="send_comment()">Submit</button>'+
						'</td>'+
					'</tr>'+
				'<table>');

				},1000);

				function send_comments () {
					$.ajax({
						url:'{{ url("komentar") }}',
						type:'POST',
						data:{'idpost':{{ $data->id }},
								'_token':'{{ csrf_token() }}' ,
								'isi':$("#input_komentar").val() },
							success:function (argument) {
								if(argument=="sukses"){
									alert('sukses');
									$('#input_komentar').val('');

									load_comments({{ $data->id }});
								}
							},
							error:function() {
								alert('erorr');
						}

						function load_comments (id) {
							$.ajax({
								url:'load_comments/'+id,
								type:'GET',
								success:function (argument) {

									$("#komentar").html('');
					
										$each($.parseJSON(argument), function() {

										$("#komentar").append('<li>'+
											'<div>'+this.isi+'</div>'+
											'</li>');
									};
								}
							});
						}
					});

				}

		</script>


	@endsection