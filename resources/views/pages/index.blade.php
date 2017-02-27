@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-left">
                {!! Breadcrumbs::render('breadcrumbs', ['label'=> trans('Pages'), 'route' => 'pages.index', 'params' => ['conference_alias' => $conference->alias]]) !!}
            </div>
            {{ Html::link(route('pages.create', ['conference_alias' => $conference->alias]), trans('Create page'), ['class' => 'btn btn-primary pull-right']) }}
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('Pages') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">id</th>
                                    <th class="column-title">{{ trans('Name') }}</th>
                                    <th class="column-title">{{ trans('Alias') }}</th>
                                    <th class="column-title">{{ trans('Order') }}</th>
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
                                        {{ $item->alias }}
                                    </td>
                                    <td>
                                        {{ $item->order }}
                                    </td>
                                    <td class="text-right">
                                        @include('partials/actions', ['route' => 'pages', 'id' => $item->id])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
