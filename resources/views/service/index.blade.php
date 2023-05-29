@extends('layouts.dashboard')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                <h4>Services</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>Title</th>
                        <th>Card Body</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                    @foreach($services as $service)
                        <tr>
                            <td>
                               <p>{{$service->card_title}}</p>
                            </td>
                            <td>{{$service->card_body_details}}</td>
                            <td>
                                <div class="badge @if ($service->is_active == 0) badge-danger @else badge-success @endif">
                                    @if ($service->is_active == 0) Inactive
                                    @else Active
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($service->is_active == 0)
                                            <a class="btn btn-primary" href="{{route('service.show', $service->id)}}">Active</a>
                                        @else
                                            <a class="btn btn-danger" href="{{route('service.show', $service->id)}}">Inactive</a>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="{{route('service.edit', $service->id)}}">Update</a>
                                    </div>
                                    <div class="col-md-4">
                                        <form class="" action="{{route('service.destroy', $service->id)}}" method='post'>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
