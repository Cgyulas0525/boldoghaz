<div class="table-responsive">
    <table class="table" id="vismaiortypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vismaiortypes as $vismaiortypes)
            <tr>
                <td>{{ $vismaiortypes->name }}</td>
            <td>{{ $vismaiortypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['vismaiortypes.destroy', $vismaiortypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vismaiortypes.show', [$vismaiortypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('vismaiortypes.edit', [$vismaiortypes->id]) }}" class='btn btn-default btn-xs'>
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
