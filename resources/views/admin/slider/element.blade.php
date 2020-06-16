<div class="col-lg-7">
	<div class="form-group">
    	<label>Title<span class="required-star"> *</span></label>
        <input type="text" value="{{isset($slider->title) ? $slider->title:old('title')}}" name="title" class="form-control">
        @error('title') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    	<label>Image<span class="required-star"> *</span></label>
        <input type="file" value="{{isset($slider->img) ? $slider->img:old('img')}}" name="img" class="form-control">
        @error('img') <span class="help-block m-b-none text-danger">{{ $message }}</span> @enderror
    </div>

    <label>Status</label>
        <input type="checkbox"  name="status" >
    
</div>