<div class="table-responsive">
    <table class="table" id="partnerspartnertypes-table">
        <thead>
            <tr>
                <th>Partner Id</th>
        <th>Partnertypes Id</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partnerspartnertypes as $partnerspartnertypes)
            <tr>
                <td>{{ $partnerspartnertypes->partner_id }}</td>
            <td>{{ $partnerspartnertypes->partnertypes_id }}</td>
            <td>{{ $partnerspartnertypes->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partnerspartnertypes.destroy', $partnerspartnertypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partnerspartnertypes.show', [$partnerspartnertypes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partnerspartnertypes.edit', [$partnerspartnertypes->id]) }}" class='btn btn-default btn-xs'>
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
