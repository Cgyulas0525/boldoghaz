<div class="table-responsive">
    <table class="table" id="penaltytypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Businessrate</th>
        <th>Daypenalty</th>
        <th>Daypenaltymax</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($penaltytypes as $penaltytypes)
            <tr>
                <td>{{ $penaltytypes->name }}</td>
            <td>{{ $penaltytypes->businessrate }}</td>
            <td>{{ $penaltytypes->daypenalty }}</td>
            <td>{{ $penaltytypes->daypenaltymax }}</td>
            <td>{{ $penaltytypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['penaltytypes.destroy', $penaltytypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('penaltytypes.show', [$penaltytypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('penaltytypes.edit', [$penaltytypes->id]) }}" class='btn btn-default btn-xs'>
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
