<div class="modal fade" id="{{str_replace( " " , "" ,$item->name . $item->id)}}" tabindex="-1" aria-labelledby="{{str_replace( " " , "" ,$item->name . $item->id)}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('shop.addToCart', $item->id) }}" method="post">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="{{str_replace( " " , "" ,$item->name . $item->id)}}Label">{{$item->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="col-form-label">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" min="1" max="99">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>