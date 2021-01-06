


<select>
    @foreach($sh as $create)
    <option value="{{$create ->expert}}">{{$create->expert}}</option> @endforeach
</select>