<div class="table-responsive">
    <table class="table" id="quantities-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quantities as $quantity)
            <tr>
                <td>{{ $quantity->name }}</td>
            <td>{{ $quantity->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['quantities.destroy', $quantity->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quantities.show', [$quantity->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('quantities.edit', [$quantity->id]) }}" class='btn btn-default btn-xs'>
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
