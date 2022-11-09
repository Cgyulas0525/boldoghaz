<div class="table-responsive">
    <table class="table" id="contractnoncontents-table">
        <thead>
            <tr>
                <th>Contract Id</th>
        <th>Contractnoncontenttypes Id</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractnoncontents as $contractnoncontent)
            <tr>
                <td>{{ $contractnoncontent->contract_id }}</td>
            <td>{{ $contractnoncontent->contractnoncontenttypes_id }}</td>
            <td>{{ $contractnoncontent->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractnoncontents.destroy', $contractnoncontent->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractnoncontents.show', [$contractnoncontent->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractnoncontents.edit', [$contractnoncontent->id]) }}" class='btn btn-default btn-xs'>
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
