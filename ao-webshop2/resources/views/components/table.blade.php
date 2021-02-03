<table class="table table-hover table-dark">
    <thead>
      <tr>
          @foreach ($headers as $item)
          <th scope="col">{{$item}}</th>
          @endforeach
          @if ($options)
          <th scope="col-md-3">options</th>
          @endif
      </tr>
    </thead>
    <tbody>
        @if (count($content) > 0)
        @foreach ($content as $item)
                <tr>
                    @foreach ($headers as $head)
                        <td>
                            @if (empty( $item->$head ) && $item->$head !== false )
                                NULL
                            @else
                                @if ($head == 'id')
                                    <a href="{{route( $modelName .'.show', $item->id)}}" class="text-decoration-none">{{$item->$head}}</a>
                                @else
                                @switch(is_bool($item->$head))
                                    @case(true)
                                        @switch($item->$head)
                                            @case(1)
                                                true
                                                @break
                                            @case(0)
                                                false
                                                @break
                                            @default

                                        @endswitch
                                        @break
                                    @case(false)
                                        {{$item->$head}}
                                        @break
                                    @default
                                        
                                @endswitch
                                    
                                @endif
                            @endif
                        </td>
                    @endforeach
                    @if ($options)
                    <td>
                        <form action="{{route( $modelName . '.destroy', $item->id)}}" class="form" method="post">
                            <a href="{{route( $modelName . '.edit', $item->id)}}" class="btn btn-info">edit</a>
                            @method('delete')
                            @csrf

                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                    </td>
                    @endif
                </tr>
            
        @endforeach
        @else
        <tr>
            <th scope="row" colspan="12"><p>No {{$modelName }} found</p></th>
        </tr>
        @endif
        @if ($options)
        <tr>
            <th scope="row" colspan="12"><a href="{{ route( $modelName . '.create') }}">Create new {{$modelName}}</a></th>
        </tr>
        @endif
    </tbody>
  </table>