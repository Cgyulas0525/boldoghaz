<div class="table-responsive">
    <table class="table" id="addresses-table">
        <thead>
            <tr>
                <th>Table Id</th>
        <th>Parent Id</th>
        <th>Addresstype Id</th>
        <th>Postcode</th>
        <th>Settlement</th>
        <th>Address</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{{ $address->table_id }}</td>
            <td>{{ $address->parent_id }}</td>
            <td>{{ $address->addresstype_id }}</td>
            <td>{{ $address->postcode }}</td>
            <td>{{ $address->settlement }}</td>
            <td>{{ $address->address }}</td>
            <td>{{ $address->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('addresses.show', [$address->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('addresses.edit', [$address->id]) }}" class='btn btn-default btn-xs'>
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
