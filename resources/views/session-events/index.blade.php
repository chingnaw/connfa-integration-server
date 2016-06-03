@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-left">
                {!! Breadcrumbs::render('breadcrumbs', ['label'=> trans('Session Events'), 'route' => 'sessions.index']) !!}
            </div>
            {{ Html::link(route('sessions.create'), trans('Create session event'), ['class' => 'btn btn-primary pull-right']) }}
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('Session events') }}</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">id</th>
                                <th class="column-title">{{ trans('Name') }}</th>
                                <th class="column-title">{{ trans('Start at') }}</th>
                                <th class="column-title">{{ trans('End at') }}</th>
                                <th class="column-title no-link last"><span class="nobr">{{ trans('Action') }}</span></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->start_at }}
                                    </td>
                                    <td>
                                        {{ $item->end_at }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('sessions.show', ['id' => $item->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> {{ trans('View') }}</a>
                                        <a href="{{ route('sessions.edit', ['id' => $item->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('Edit') }}</a>
                                        {!! Form::open(['url' => route('sessions.destroy', ['id' => $item->id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']) !!}
                                        {{ method_field('DELETE') }}
                                        {{ Form::button("<i class='fa fa-trash-o'></i> ".trans('Delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pull-right">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection