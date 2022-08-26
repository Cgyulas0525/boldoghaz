<div class="table-responsive">
    <table class="table" id="ececitems-table">
        <thead>
            <tr>
                <th>Energyclassifications Id</th>
        <th>Ecitems Id</th>
        <th>Heatingtypes Id</th>
        <th>Quantity Id</th>
        <th>Quantity</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ececitems as $ececitems)
            <tr>
                <td>{{ $ececitems->energyclassifications_id }}</td>
            <td>{{ $ececitems->ecitems_id }}</td>
            <td>{{ $ececitems->heatingtypes_id }}</td>
            <td>{{ $ececitems->quantity_id }}</td>
            <td>{{ $ececitems->quantity }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ececitems.destroy', $ececitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ececitems.show', [$ececitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ececitems.edit', [$ececitems->id]) }}" class='btn btn-default btn-xs'>
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
