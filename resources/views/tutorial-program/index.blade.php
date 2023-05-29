@extends('layouts.dashboard')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                <h4>Program Tutorail Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>Title</th>
                        <th>Card Body</th>
                        <th>Subject</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                    @foreach($programs as $program)
                        <tr>
                            <td>
                                <p>{{$program->title}}</p>
                            </td>
                            <td>{{$program->body_details}}</td>
                            @if($program->subject_type == 1)
                            <td>HTML</td>
                            @elseif($program->subject_type == 2)
                                <td>Javascript</td>
                            @elseif($program->subject_type == 3)
                                <td>CSS</td>
                            @elseif($program->subject_type == 4)
                                <td>Bootstrap</td>
                            @endif
                            <td>
                                <div class="badge @if ($program->is_active == 0) badge-danger @else badge-success @endif">
                                    @if ($program->is_active == 0) Inactive
                                    @else Active
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($program->is_active == 0)
                                            <a class="btn btn-primary" href="{{route('program.show', $program->id)}}">Active</a>
                                        @else
                                            <a class="btn btn-danger" href="{{route('program.show', $program->id)}}">Inactive</a>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="{{route('program.edit', $program->id)}}">Update</a>
                                    </div>
                                    <div class="col-md-4">
                                        <form class="" action="{{route('program.destroy', $program->id)}}" method='post'>
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
