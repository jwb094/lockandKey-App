  @props(['categories'])
      <ul {{ $attributes->merge(['class' =>'']) }}>
        @foreach($categories as $key => $value)
              <li class="list-group-item">{{ $value }}</li>
        @endforeach
         

       </ul>
