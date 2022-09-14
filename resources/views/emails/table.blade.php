<div class="table-responsive">
    <table class="table" id="emails-table">
        <thead>
            <tr>
                <th>Table Id</th>
        <th>Parent Id</th>
        <th>Email</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emails as $emails)
            <tr>
                <td>{{ $emails->table_id }}</td>
            <td>{{ $emails->parent_id }}</td>
            <td>{{ $emails->email }}</td>
            <td>{{ $emails->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['emails.destroy', $emails->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('emails.show', [$emails->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('emails.edit', [$emails->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
