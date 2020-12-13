<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">options</th>
      </tr>
    </thead>
    <tbody>
        @if (count($content) > 0)
        @foreach ($content as $item)
            
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td><a href="{{ route( $modelName . '.show',$item->id) }}">{{ $item->name}}</a></td>
                    <td>
                    <a href="{{route( $modelName . '.edit', $item->id)}}" class="btn btn-info">edit</a>

                    <form action="{{route( $modelName . '.destroy', $item->id)}}" class="form" method="post">
                        @method('delete')
                        @csrf

                        <input type="submit" value="Delete" class="btn btn-danger" >
                    </form>
                    {{-- <a href="{{route( $modelName . '.destroy', $item->id)}}" class="btn btn-danger">delete</a> --}}
                    </td>
                </tr>
            
        @endforeach
        @else
        <tr>
            <th scope="row" colspan="3"><p>No categories found</p></th>
        </tr>
        @endif
        <tr>
            <th scope="row" colspan="3"><a href="{{ route('category.create') }}">Create new category</a></th>
        </tr>
    </tbody>
  </table>