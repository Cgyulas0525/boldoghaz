<div class="table-responsive">
    <table class="table" id="phonenumbers-table">
        <thead>
            <tr>
                <th>Table Id</th>
        <th>Parent Id</th>
        <th>Phonenumbertypes Id</th>
        <th>Phonenumber</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($phonenumbers as $phonenumbers)
            <tr>
                <td>{{ $phonenumbers->table_id }}</td>
            <td>{{ $phonenumbers->parent_id }}</td>
            <td>{{ $phonenumbers->phonenumbertypes_id }}</td>
            <td>{{ $phonenumbers->phonenumber }}</td>
            <td>{{ $phonenumbers->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['phonenumbers.destroy', $phonenumbers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('phonenumbers.show', [$phonenumbers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('phonenumbers.edit', [$phonenumbers->id]) }}" class='btn btn-default btn-xs'>
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
