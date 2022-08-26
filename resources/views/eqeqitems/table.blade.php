<div class="table-responsive">
    <table class="table" id="eqeqitems-table">
        <thead>
            <tr>
                <th>Equipmenttypes Id</th>
        <th>Eqitems Id</th>
        <th>Valuelimit</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($eqeqitems as $eqeqitems)
            <tr>
                <td>{{ $eqeqitems->equipmenttypes_id }}</td>
            <td>{{ $eqeqitems->eqitems_id }}</td>
            <td>{{ $eqeqitems->valuelimit }}</td>
            <td>{{ $eqeqitems->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['eqeqitems.destroy', $eqeqitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('eqeqitems.show', [$eqeqitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('eqeqitems.edit', [$eqeqitems->id]) }}" class='btn btn-default btn-xs'>
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
