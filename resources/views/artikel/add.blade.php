@extends('app')

@section('content')
	<div class="panel">
		<div class="heading">
			<span class="title">
				<span class="class .header">Create New Post</span>
				</span>
		</div>
	<form method="POST" action="{{ url('artikel/save') }}" enctype="multipart/form-data">
	<table style="width:100%">
		<tr>
			<td>
				<span>Judul</span>
		</td>
			
		<td>
			<div class="input-control text full-size">
			<input type="text" name="judul">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</td>
		<td>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<span>Isi</span>
			</td>
			<td>
				<div class="input-control textarea full-size">
					<textarea name="isi" rows="8" cols="40"></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td>Tag</td>
			<td>
				<div class="input-control textarea full-size">
				<input type="text" name="tag">
				</div>
				</td>
		</tr>
		<tr>
				<td>Sampul</td>
				<td>
				<div class="input-control file full-size" data-role="input">
					<input type="file" name="sampul">
					<button class="button"><span class="mif-folder"></span></button>
				</div>
				</td>
		</tr>
			<td></td>
			<td>
				<button class="button info block-shadow-info text-shadow" type="sumbit">Submit</button>
				<button class="button" type="reset">Cancel</button>
			</td>
		</div>
		</tr>
			    	
			    </div>
			</td>
		</tr>
		</table>
	</table>
@endsection







