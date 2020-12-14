<table class="table table-hover table-dark">
    <thead>
      <tr>
          @foreach ($headers as $item)
          <th scope="col">{{$item}}</th>
          @endforeach
         <th scope="col">options</th>
      </tr>
    </thead>
    <tbody>
        @if (count($content) > 0)
        @foreach ($content as $item)
                <tr>
                    @foreach ($headers as $head)
                        <td>
                            @if (empty( $item->$head ))
                                NULL
                            @else
                                @if ($head == 'name')
                                    <a href="{{route( $modelName .'.show', $item->id)}}" class="text-decoration-none">{{$item->$head}}</a>
                                @else
                                    {{$item->$head}}
                                @endif
                            @endif
                        </td>
                    @endforeach
                    <td>
                    <a href="{{route( $modelName . '.edit', $item->id)}}" class="btn btn-info">edit</a>

                    <form action="{{route( $modelName . '.destroy', $item->id)}}" class="form" method="post">
                        @method('delete')
                        @csrf

                        <input type="submit" value="Delete" class="btn btn-danger" >
                    </form>
                    </td>
                </tr>
            
        @endforeach
        @else
        <tr>
            <th scope="row" colspan="12"><p>No categories found</p></th>
        </tr>
        @endif
        <tr>
            <th scope="row" colspan="12"><a href="{{ route( $modelName . '.create') }}">Create new {{$modelName}}</a></th>
        </tr>
    </tbody>
  </table>