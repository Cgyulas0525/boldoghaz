<div class="table-responsive">
    <table class="table" id="ecitems-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ecitems as $ecitems)
            <tr>
                <td>{{ $ecitems->name }}</td>
            <td>{{ $ecitems->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ecitems.destroy', $ecitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ecitems.show', [$ecitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ecitems.edit', [$ecitems->id]) }}" class='btn btn-default btn-xs'>
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
