@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-left">
                {!! Breadcrumbs::render('breadcrumbs', [['label'=> trans('Points'), 'route' => 'points.index', 'params' => ['conference_alias' => $conference->alias]], ['label'=> trans('Edit point'), 'route' => 'points.index', 'params' => ['conference_alias' => $conference->alias]]]) !!}
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('Edit point') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    {!! Form::open(['route' => ['points.update', 'id' => $data->id, 'conference_alias' => $conference->alias], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', trans('Name')." *", ['class' => "control-label col-md-3 col-sm-3 col-xs-12"]) }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('name', $data->name, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('details_url') ? ' has-error' : '' }}">
                            {{ Form::label('details_url', trans('Details url'), ['class' => "control-label col-md-3 col-sm-3 col-xs-12"]) }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::url('details_url', $data->details_url, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                @if ($errors->has('details_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @include('partials/image-upload', [
                            'create' => false,
                            'labelName' => trans('Image'),
                            'fieldName' => 'image',
                            'fieldNameValue' => $data->image,
                            'required' => false,
                        ])

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            {{ Form::label('order', trans('Order'), ['class' => "control-label col-md-3 col-sm-3 col-xs-12"]) }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::number('order', $data->order, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {{ Form::label('description', trans('Description'), ['class' => "control-label col-md-3 col-sm-3 col-xs-12"]) }}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::textarea('description', $data->description, ['id' => 'editor-points', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                {{ Form::submit(trans('Update'), ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
