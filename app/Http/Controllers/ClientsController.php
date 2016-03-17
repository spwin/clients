<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Clients::orderBy('score', 'DESC')->get();
		return view('Clients.index')->with(array(
			'clients' => $clients
		));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function pending()
	{
		$clients = Clients::where(['status_quote_sent' => 0, 'archived' => 0])->orderBy('score', 'DESC')->get();
        return view('Clients.index')->with(array(
			'clients' => $clients,
			'status' => 'pending'
		));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function contacted()
	{
		$clients = Clients::where(['status_quote_sent' => 1, 'archived' => 0])->get();
		return view('Clients.index')->with(array(
			'clients' => $clients,
			'status' => 'contacted'
		));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function archived()
	{
		$clients = Clients::where(['archived' => 1])->get();
		return view('Clients.index')->with(array(
			'clients' => $clients,
			'status' => 'archived'
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Clients.create')->with(array(
			'choices' => ['NO','LOW','NORMAL','GOOD','HIGH']
		));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$input['status_quote_sent'] = array_key_exists('status_quote_sent', $input) ? 1 : 0;
		$input['status_got_reply'] = array_key_exists('status_got_reply', $input) ? 1 : 0;
		$input['status_collaboration'] = array_key_exists('status_collaboration', $input) ? 1 : 0;
		$input['status_friend'] = array_key_exists('status_friend', $input) ? 1 : 0;
		$client = new Clients();
		$client->fill($input);
		$client->setAttribute('score', $client->score());
		$client->save();

		//$id = Clients::create($input);
		//Clients::where('id', '=', $id)->update(array('score' => $id));

		Session::flash('flash_message', 'Client successfully added!');
		return Redirect::action('ClientsController@pending');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Clients::findOrFail($id);
		return view('Clients.edit')->with(array(
			'client' => $client,
			'choices' => ['NO','LOW','NORMAL','GOOD','HIGH']
		));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$client = Clients::findOrFail($id);
		$input = $request->all();
		$input['status_quote_sent'] = array_key_exists('status_quote_sent', $input) ? 1 : 0;
		$input['status_got_reply'] = array_key_exists('status_got_reply', $input) ? 1 : 0;
		$input['status_collaboration'] = array_key_exists('status_collaboration', $input) ? 1 : 0;
		$input['status_friend'] = array_key_exists('status_friend', $input) ? 1 : 0;
		$client->update($input);
		$client->setAttribute('score', $client->score());
		$client->save();
		Session::flash('flash_message', 'Client successfully edited!');
		return Redirect::action('ClientsController@pending');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
