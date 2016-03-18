@extends('layouts.dashboard')
@section('page_heading', ucfirst($status).' clients')
@section('section')
<!-- /.row -->
<div class="col-sm-12">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            @section ('table_panel_title')
                Clients
            @endsection
            @section ('table_panel_body')
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>WEB</th>
                        <th>email</th>
                        <th>Language</th>
                        <th>Friend</th>
                        <th>Budget</th>
                        <th>Trust</th>
			<th>Score</th>

                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->title }}</td>
                            <td>{{ $client->web }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->language }}</td>
                            <td>{{ $client->status_friend ? 'FRIEND' : '' }}</td>
                            <td>{{ $client->rate_budget }}</td>
                            <td>{{ $client->rate_trusted }}</td>
			                <td>{{ $client->score() }}%</td>
                            <td>
                                <a href="{{ action('ClientsController@edit', $client->id) }}" class="btn btn-xs btn-success">Edit client</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'table'))
        </div>
    </div>
</div>
@stop
