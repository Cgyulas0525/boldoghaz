<div class="table-responsive">
    <table class="table" id="contractnoncontenttypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Types</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractnoncontenttypes as $contractnoncontenttypes)
            <tr>
                <td>{{ $contractnoncontenttypes->name }}</td>
            <td>{{ $contractnoncontenttypes->types }}</td>
            <td>{{ $contractnoncontenttypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractnoncontenttypes.destroy', $contractnoncontenttypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractnoncontenttypes.show', [$contractnoncontenttypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractnoncontenttypes.edit', [$contractnoncontenttypes->id]) }}" class='btn btn-default btn-xs'>
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
