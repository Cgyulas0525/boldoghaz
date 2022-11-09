<div class="table-responsive">
    <table class="table" id="contractcontents-table">
        <thead>
            <tr>
                <th>Contract Id</th>
        <th>Contractcontenttypes Id</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractcontents as $contractcontent)
            <tr>
                <td>{{ $contractcontent->contract_id }}</td>
            <td>{{ $contractcontent->contractcontenttypes_id }}</td>
            <td>{{ $contractcontent->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractcontents.destroy', $contractcontent->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractcontents.show', [$contractcontent->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractcontents.edit', [$contractcontent->id]) }}" class='btn btn-default btn-xs'>
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
