@extends('app')

@section('content')


<div class="panel">
	<div class="heading">
	<span class="icon mif-file-text"></span>
	<span class="title">Artikel</span>
</div>
<div class="content">
	<table style="width: 100%; " class="table">
		<thead>
			<th>No.</th>
			<th>Judul</th>
			<th>Tag</th>
			<th colspan="2">Action</th>
		</thead>
		<tbody>
		<?php $a = 1; ?>
			@foreach($data as $post)
				<tr>
					<td><?php echo $a; $a+=1; ?></td>
					<td>{{ $post->judul }}</td>
					<td>{{ $post->tag }}</td>
					<td><a href="{{ url('artikel/edit/'.$post->id) }}">Edit</a></td>
					<td><a href="{{ url('artikel/delete/'.$post->id) }}" onclick="return confirm ('Yakin Pengen DHapus ?')">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
			</table>
	</div>
		</div>



@endsection