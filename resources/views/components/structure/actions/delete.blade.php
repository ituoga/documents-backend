<form method="POST" action="{{$action}}" class="">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger ml-2"
        onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
</form>
