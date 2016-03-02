@extends('layouts.dashboard')
@section('page_heading', 'Client create')
@section('section')
    <div class="col-sm-12 mb-20px">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                {{ Form::model($client, [
                'method' => '',
                'action' => ['ClientsController@update', $client->id]
                ]) }}

                <h3>General info</h3>

                <div class="form-group">
                    {{ Form::label('title', 'TITLE:', ['class' => 'control-label']) }}
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Umbrella corporation', 'required' => 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('web', 'WEB:', ['class' => 'control-label']) }}
                    {{ Form::text('web', null, ['class' => 'form-control', 'placeholder' => 'google.co.uk']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'E-mail:', ['class' => 'control-label']) }}
                    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'info@pixsens.co.uk']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('phone', 'Phone:', ['class' => 'control-label']) }}
                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '+44 77654 83377']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('person', 'Contact person:', ['class' => 'control-label']) }}
                    {{ Form::text('person', null, ['class' => 'form-control', 'placeholder' => 'Mr. John']) }}
                </div>

                <h3>Client status</h3>

                <div class="form-group">
                    <label>
                        {{ Form::checkbox('status_quote_sent', null); }} Quote already sent
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        {{ Form::checkbox('status_got_reply', null); }} Got reply
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        {{ Form::checkbox('status_collaboration', null); }} Collaborated
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        {{ Form::checkbox('status_friend', null); }} Our friend
                    </label>
                </div>

                <h3>Rate client</h3>

                <div class="form-group">
                    {{ Form::label('rate_website', 'Rate website:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_website', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_performance', 'Rate performance:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_performance', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_design', 'Rate design:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_design', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_mobile', 'Rate mobile version:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_mobile', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_seo', 'Rate SEO:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_seo', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_multilingual', 'Rate multilingual:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_website', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_social', 'Rate social:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_social', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_budget', 'Rate budget:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_budget', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('rate_trusted', 'Rate trust:', ['class' => 'control-label']) }}
                    {{ Form::select('rate_trusted', $choices, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('comments', 'Comments:', ['class' => 'control-label']) }}
                    {{ Form::textarea('comments', null, ['class' => 'form-control', 'placeholder' => 'Just put some comments here']) }}
                </div>

                @include('widgets.button', array('class'=>'btn btn-primary', 'value'=>'Submit', 'type' => 'submit'))
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop