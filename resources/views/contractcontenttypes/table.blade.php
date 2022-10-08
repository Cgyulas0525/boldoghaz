<div class="table-responsive">
    <table class="table" id="contractcontenttypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Types</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractcontenttypes as $contractcontenttypes)
            <tr>
                <td>{{ $contractcontenttypes->name }}</td>
            <td>{{ $contractcontenttypes->types }}</td>
            <td>{{ $contractcontenttypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractcontenttypes.destroy', $contractcontenttypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractcontenttypes.show', [$contractcontenttypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractcontenttypes.edit', [$contractcontenttypes->id]) }}" class='btn btn-default btn-xs'>
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
