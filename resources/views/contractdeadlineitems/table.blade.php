<div class="table-responsive">
    <table class="table" id="contractdeadlineitems-table">
        <thead>
            <tr>
                <th>Contractdeadline Id</th>
        <th>Deadline</th>
        <th>Performance</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractdeadlineitems as $contractdeadlineitem)
            <tr>
                <td>{{ $contractdeadlineitem->contractdeadline_id }}</td>
            <td>{{ $contractdeadlineitem->deadline }}</td>
            <td>{{ $contractdeadlineitem->performance }}</td>
            <td>{{ $contractdeadlineitem->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractdeadlineitems.destroy', $contractdeadlineitem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractdeadlineitems.show', [$contractdeadlineitem->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractdeadlineitems.edit', [$contractdeadlineitem->id]) }}" class='btn btn-default btn-xs'>
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
