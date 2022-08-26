<div class="table-responsive">
    <table class="table" id="eqitems-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($eqitems as $eqitems)
            <tr>
                <td>{{ $eqitems->name }}</td>
            <td>{{ $eqitems->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['eqitems.destroy', $eqitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('eqitems.show', [$eqitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('eqitems.edit', [$eqitems->id]) }}" class='btn btn-default btn-xs'>
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
