<div class="table-responsive">
    <table class="table" id="constructionphases-table">
        <thead>
            <tr>
                <th>Parent Id</th>
        <th>Name</th>
        <th>Commit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($constructionphases as $constructionphase)
            <tr>
                <td>{{ $constructionphase->parent_id }}</td>
            <td>{{ $constructionphase->name }}</td>
            <td>{{ $constructionphase->commit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['constructionphases.destroy', $constructionphase->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('constructionphases.show', [$constructionphase->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('constructionphases.edit', [$constructionphase->id]) }}" class='btn btn-default btn-xs'>
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
