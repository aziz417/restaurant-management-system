<div class="col-lg-7">
	<div class="form-group">
    	<label>Name<span class="required-star"> *</span></label>
        <input type="text" value="{{isset($item->name) ? $item->name:old('name')}}" name="name" class="form-control">
        @error('name') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    
    <div class="form-group">
        <label>Category<span class="required-star"> *</span></label>
        <select class="form-control" name="category_id" required="required">
            <option value="">select</option>
            @foreach($categories as $category)
                <option @if(isset($item) and $item->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
    	<label>Description<span class="required-star"> *</span></label>
        <input type="text" value="{{isset($item->description) ? $item->description:old('description')}}" name="description" class="form-control">
        @error('description') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    	<label>Price<span class="required-star"> *</span></label>
        <input type="number" value="{{isset($item->price) ? $item->price:old('price')}}" name="price" class="form-control">
        @error('price') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    	<label>Image<span class="required-star"> *</span></label>
        <input  class="form-control"  name="img" type="file"><br>
        <input type="hidden" name="oldImage" value="{{ isset($item->image) ? $item->image :''}}">        
        @error('img') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    <label>Status</label>
        <input type="checkbox" @if(isset($item) and $item->status == 'on') checked @endif  name="status" >
    
</div>