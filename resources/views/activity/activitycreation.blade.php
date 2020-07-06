@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




<form method="post" action="/activity">
    @csrf
    <div>
    <select name="cities[]" id="cities" multiple>
    @foreach($cities as $city)
    <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
    </select>
    </div>
    <div>
    <select name="categories[]" id="categories" multiple>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    </div>
    
        
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Description</label>
        <input type="text" name="description" >
    </div>
    <div>
        <label>Group Size</label>
        <input type="text" name="group_size" >
    </div>
    <div>
        <label>Price</label>
        <input type="text" name="price" >
    </div>
    <div>
        <label>Date and Time of Activity</label>
        <input type="datetime-local" name="date_time" >
    </div>
    <div>
        <label>Address of activity</label>
        <input type="text" name="address" >
    </div>
    <div>
        <label>Postcode</label>
        <input type="text" name="postcode" >
    </div>
    <div>
        <label>Contact email</label>
        <input type="text" name="email" >
    </div>



    <div>
    <select name="books[]" id="books" multiple>
    @foreach($books as $book)
    <option value="{{$book->id}}">{{$book->title}}</option>
    @endforeach
    </select>
    </div>

    <button type="submit">Save my new book!</button>
</form>
