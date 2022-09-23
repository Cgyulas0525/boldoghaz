<div class="table-responsive">
    <table class="table" id="contracttypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contracttypes as $contracttypes)
            <tr>
                <td>{{ $contracttypes->name }}</td>
            <td>{{ $contracttypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contracttypes.destroy', $contracttypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contracttypes.show', [$contracttypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contracttypes.edit', [$contracttypes->id]) }}" class='btn btn-default btn-xs'>
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
