<div class="table-responsive">
    <table class="table" id="contractpenalties-table">
        <thead>
            <tr>
                <th>Contract Id</th>
        <th>Penaltytypes Id</th>
        <th>Contractionphase Id</th>
        <th>Deadline</th>
        <th>Performance</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractpenalties as $contractpenalty)
            <tr>
                <td>{{ $contractpenalty->contract_id }}</td>
            <td>{{ $contractpenalty->penaltytypes_id }}</td>
            <td>{{ $contractpenalty->contractionphase_id }}</td>
            <td>{{ $contractpenalty->deadline }}</td>
            <td>{{ $contractpenalty->performance }}</td>
            <td>{{ $contractpenalty->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractpenalties.destroy', $contractpenalty->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractpenalties.show', [$contractpenalty->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractpenalties.edit', [$contractpenalty->id]) }}" class='btn btn-default btn-xs'>
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
