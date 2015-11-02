<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('artikel', 'ArtikelController@index');
Route::get('artikel/add', 'ArtikelController@create');
Route::post('artikel/save', 'ArtikelController@store');
Route::get('artikel/edit/{id}', 'ArtikelController@edit');
Route::get('artikel/delete/{id}', 'ArtikelController@destroy');
Route::post('artikel/update', 'ArtikelController@update');
Route::post('komentar', 'ArtikelController@komentar');
Route::get('load_comments/{id}', function ($id)
{
	$data = App\Komentar::where('idpost',$id)->get();
	echo json_decode($data);
});

Route::get('/images/{filename}',
	function($filename)
{
	$path = storage_path().
	'/'	. $filename;

	$file = File::get($path);
	$type = File::mimeType($path);

	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);

	return $response;
});


Route::get('/{slug}', 'ArtikelController@show');

Route::get('/pdf/{slug}', 'WelcomeController@showpdf');

Route::get('/mail/{slug}', function ($slug)
{
	$artikel = \App\post::where('slug',$slug)->first();

	Mail::send('artikel.pdf', ['data' => $artikel],
		function($message)
		{
			$message->to('hasanlana95@gmail.com', Auth::user()->name)
			->subject("Update Artikel");
		});
	return redirect(url());

});
	
	Route::get('api/artikel/all',function()
	{
		$data = array('artikel' =>
				array('id' =>1,
					'judul'=>'judul artikel',
					'isi'=>'isi artikel',
					'timestamps'=>'2015-01-01 01:01:01')
				);


	$json = json_encode($data);
	echo $json;
	//	obj = json_decode($json);
	//	echo "<pre>".print
	});
		Route::get('api/artikel/all',function()
	{
/*		$key = url("api/artikel/all");
		$ch =curl_init($key);
		curl_setopt($ch, CURLOPT_URL, $key);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $key);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, $key);
		$hasil = curl_exec($ch);
		curl_close($ch);
*/
		$data= \App\post::all();

		$arr = Array();
		foreach ($data as $key) {
			$arr[] = array(
							'slug'=>$key['slug'],
							'isi'=>$key['isi'],
							'create_at'=>$key['created_at'],
							'author'=>\App\User::find($key['idpengguna'])->first()['email'],
							'tag'=>$key['tag'],
							'sampul'=>url('images/',$key['sampul']),
							'judul'=>$key['judul']
							);
		}

		echo json_encode($arr);
});
Route::get("api/artikel/detail/{slug}",function($slug)
{
	$data = \App\post::where('slug',$slug)->first();
			$arr = array(
							'slug'=>$key['slug'],
							'isi'=>$key['isi'],
							'create_at'=>$key['created_at'],
							'author'=>\App\User::find($key['idpengguna'])->first()['email'],
							'tag'=>$key['tag'],
							'sampul'=>url('images/',$key['sampul']),
							'judul'=>$key['judul']
							);

							if(sizeof($key)==0){
								$data = array('status'=>"Erorr",
											'error_code'=>404,
											'name'=>'artikel_notfound',
											'msg'=>'Artikel Not Found');
									echo json_encode($data);
									}else{
										echo json_encode($arr);	
									
							}
});
Route::get("api/artikel/{type}/{slug}",function($type,$cari)
{
	$data = \App\post::where($type,$cari)->get();
		
	$arr = array();
	
	foreach ($data as $key) {		
		$arr[] = array(
		'slug'=>$key['slug'],
		'isi'=>$key['isi'],
		'create_at'=>$key['created_at'],
		'author'=>\App\User::find($key['idpengguna'])->first()['email'],
		'tag'=>$key['tag'],
		'sampul'=>url('images/',$key['sampul']),
		'judul'=>$key['judul']
		);
	}	
	if(sizeof($data)==0){
		$data = array('status'=>"Erorr",
			'error_code'=>404,
			'name'=>'artikel_notfound',
			'msg'=>'Artikel Not Found'
		);
		echo json_encode($data);
	}else{
		echo json_encode($arr);	
	}

		if(sizeof($data)==0){
			$data = array('status'=>"Erorr",
				'error_code'=>304,
				'name'=>'type_notfound',
				'msg'=>'Type Not Found');
				echo json_encode($data);
			}
		

});
								
Route::controllers([
 	'auth' => 'Auth\AuthController',
 	'password' => 'Auth\PasswordController',
]);


