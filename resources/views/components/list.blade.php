  @props(['categories'])
  <ul {{ $attributes->merge(['class' =>'']) }}>
      @foreach($categories as $key => $value)
      <li class="list-group-item d-flex justify-content-between">

          {{ $value->website }}
          <div>
              <a type="button" class="btn" href={{ route('backend.password.edit',$value->id) }}>Edit</a>
              <form action="{{ route('backend.password.delete',$value->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  {{-- <a type="button" class="btn" href={{ route('backend.password.delete',$value->id) }}></a>Delete</a> --}}
                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Contact?')">Delete</button>
              </form>
          </div>

      </li>
      @endforeach


  </ul>
