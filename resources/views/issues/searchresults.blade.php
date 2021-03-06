@extends('app')
@section('content')
    <div class="container-fluid col-md-8">
        @if($issues->count() > 0)
            <h2><span class="grey">Search Results for: </span> @if($query) {{$query}} @endif </h2>
            <hr/>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Project</th>
                    <th>Sprint</th>
                </tr>
                </thead>
                <tbody>
                @foreach($issues as $issue)
                    <tr>
                        <td><a href="/isssues/{{$issue->id}}">{{$issue->id}}</a></td>
                        <td><a href="/issues/{{$issue->id}}">{{$issue->title}}</a></td>
                        <td>{{$issue->statusLabel}}</td>
                        <td>{{$issue->typeLabel}}</td>
                        <td>{{$issue->projectName}}</td>
                        <td>{{App\Sprint::findOrFail($issue->sprint_id)->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2>No Search Results found for: @if($query) {{$query}} @endif</h2>
        @endif
    </div>
@stop