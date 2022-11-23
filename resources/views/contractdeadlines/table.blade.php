<div class="table-responsive">
    <table class="table" id="contractdeadlines-table">
        <thead>
            <tr>
                <th>Contract Id</th>
        <th>Constructionphase Id</th>
        <th>Deadline</th>
        <th>Performance</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractdeadlines as $contractdeadline)
            <tr>
                <td>{{ $contractdeadline->contract_id }}</td>
            <td>{{ $contractdeadline->constructionphase_id }}</td>
            <td>{{ $contractdeadline->deadline }}</td>
            <td>{{ $contractdeadline->performance }}</td>
            <td>{{ $contractdeadline->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractdeadlines.destroy', $contractdeadline->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractdeadlines.show', [$contractdeadline->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractdeadlines.edit', [$contractdeadline->id]) }}" class='btn btn-default btn-xs'>
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
