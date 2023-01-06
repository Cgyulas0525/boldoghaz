<div class="table-responsive">
    <table class="table" id="contractcontracts-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Contract Id</th>
        <th>Partnercontract Id</th>
        <th>Constructionphase Id</th>
        <th>Document Name</th>
        <th>Document Urt</th>
        <th>Deadline</th>
        <th>Settlementdate</th>
        <th>Amount</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contractcontracts as $contractcontract)
            <tr>
                <td>{{ $contractcontract->id }}</td>
            <td>{{ $contractcontract->contract_id }}</td>
            <td>{{ $contractcontract->partnercontract_id }}</td>
            <td>{{ $contractcontract->constructionphase_id }}</td>
            <td>{{ $contractcontract->document_name }}</td>
            <td>{{ $contractcontract->document_urt }}</td>
            <td>{{ $contractcontract->deadline }}</td>
            <td>{{ $contractcontract->settlementdate }}</td>
            <td>{{ $contractcontract->amount }}</td>
            <td>{{ $contractcontract->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contractcontracts.destroy', $contractcontract->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contractcontracts.show', [$contractcontract->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contractcontracts.edit', [$contractcontract->id]) }}" class='btn btn-default btn-xs'>
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
