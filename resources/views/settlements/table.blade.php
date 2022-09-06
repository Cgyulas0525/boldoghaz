<div class="table-responsive">
    <table class="table" id="settlements-table">
        <thead>
            <tr>
                <th>Settlement</th>
        <th>Postalcode</th>
        <th>County</th>
        <th>Area</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settlements as $settlements)
            <tr>
                <td>{{ $settlements->settlement }}</td>
            <td>{{ $settlements->postalcode }}</td>
            <td>{{ $settlements->county }}</td>
            <td>{{ $settlements->area }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['settlements.destroy', $settlements->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('settlements.show', [$settlements->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('settlements.edit', [$settlements->id]) }}" class='btn btn-default btn-xs'>
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
