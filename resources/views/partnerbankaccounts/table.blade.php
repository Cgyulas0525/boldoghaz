<div class="table-responsive">
    <table class="table" id="partnerbankaccounts-table">
        <thead>
            <tr>
                <th>Partners Id</th>
        <th>Financialinstitutions Id</th>
        <th>Accountnumber</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partnerbankaccounts as $partnerbankaccounts)
            <tr>
                <td>{{ $partnerbankaccounts->partners_id }}</td>
            <td>{{ $partnerbankaccounts->financialinstitutions_id }}</td>
            <td>{{ $partnerbankaccounts->accountnumber }}</td>
            <td>{{ $partnerbankaccounts->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partnerbankaccounts.destroy', $partnerbankaccounts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partnerbankaccounts.show', [$partnerbankaccounts->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partnerbankaccounts.edit', [$partnerbankaccounts->id]) }}" class='btn btn-default btn-xs'>
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
