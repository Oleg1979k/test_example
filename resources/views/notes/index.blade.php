@extends('notes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>How To Create CRUD Operation In Laravel 10 - Techsolutionstuff</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('notes.create') }}"> Create New note</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($notes as $note)
            @if ($user == $note->user_id)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ $note->content }}</td>
                <td>
                    <form action="{{ route('notes.destroy',$note->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('notes.show',$note->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('notes.edit',$note->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

    {!! $notes->links() !!}

@endsection
