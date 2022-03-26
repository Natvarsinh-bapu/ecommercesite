<div class="row">
    <div class="form-group col-md-6">
        <label for="name">Product Name</label>
        {{ Form::text('name', isset($product) ? $product->name : '', array('class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name', 'required' => true)) }}
    </div>
    
    <div class="form-group col-md-6">
        <label for="short_desc">Short Description</label>
        {{ Form::text('short_desc', isset($product) ? $product->short_desc : '', array('class' => 'form-control', 'placeholder' => 'Short decsription', 'id' => 'short_desc', 'required' => true)) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="price">Price</label>
        {{ Form::text('price', isset($product) ? $product->price : '', array('class' => 'form-control', 'placeholder' => 'Price', 'id' => 'price', 'required' => true)) }}
    </div>
    
    <div class="form-group col-md-6">
        <label for="price_display">Price for display (Higher price)</label>
        {{ Form::text('price_display', isset($product) ? $product->price_display : '', array('class' => 'form-control', 'placeholder' => 'Price display', 'id' => 'price_display', 'required' => true)) }}
    </div>
</div>

<div class="row">                    
    <div class="form-group col-md-6">
        <label for="special_label">Special label</label>
        {{ Form::text('special_label', isset($product) ? $product->special_label : '', array('class' => 'form-control', 'placeholder' => 'Special label', 'id' => 'special_label', 'required' => true)) }}
    </div>

    <div class="form-group col-md-6">
        <label for="label_type">Label Type</label>
        {{ Form::select('label_type', label_type_list(), isset($product) ? $product->label_type : '', array('class' => 'form-control', 'id' => 'label_type')) }}
    </div>
</div>

<div class="row">                    
    <div class="form-group col-md-6">
        <label for="image">Image (235X235)</label>
        @if (isset($product))
            {{ Form::file('image', array('id' => 'image')) }}
        @else
            {{ Form::file('image', array('id' => 'image', 'required' => true)) }}
        @endif
    </div>

    <div class="form-group col-md-6">
        <label for="other_images">Other Images</label>
        @if (isset($product))
            {{ Form::file('other_images[]', array('id' => 'other_images', 'multiple' => true)) }}
        @else
            {{ Form::file('other_images[]', array('id' => 'other_images', 'required' => true, 'multiple' => true)) }}
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <label for="category_id">Category</label>
        {{-- {{ Form::select('category_id', $categories, '', array('class' => 'form-control', 'id' => 'category_id', 'required' => true)) }} --}}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    @forelse ($categories as $key => $value)
                        <div class="col-md-2">
                            <input type="checkbox" name="category[]" id="cat_{{ $key }}" value="{{ $key }}" {{ isset($selected) && in_array($key, $selected) ? 'checked' : '' }}>
                            <label class="cursor-pointer" for="cat_{{ $key }}">{{ $value }}</label>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <label for="description">Description</label>
        {{ Form::textarea('description', isset($product) ? $product->description : '', array('class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description', 'required' => true)) }}
    </div>
</div> 