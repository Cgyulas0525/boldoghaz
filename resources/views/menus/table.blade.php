<div class="table-responsive">
    <table class="table" id="menus-table">
        <thead>
            <tr>
                <th>Parent Id</th>
        <th>Name</th>
        <th>Icon</th>
        <th>Route</th>
        <th>Request</th>
        <th>Parenticon</th>
        <th>Userstatus Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->parent_id }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->icon }}</td>
            <td>{{ $menu->route }}</td>
            <td>{{ $menu->request }}</td>
            <td>{{ $menu->parenticon }}</td>
            <td>{{ $menu->userstatus_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menus.show', [$menu->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'>
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
