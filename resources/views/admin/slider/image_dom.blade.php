<div id="my-dom">
    <div class="col-sm-12 col-md-12 mt-2">
        <div class="form-group batch-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Main Heading<span
                                style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   name="main_heading"
                                   value="{{old('main_heading')}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mt-2" id="my-name">
        <div class="form-group batch-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Sub Heading <span
                                style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   name="sub_heading"
                                   value="{{old('sub_heading')}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mt-2" id="my-name2">
        <div class="form-group batch-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Description<span
                                style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   name="description"
                                   value="{{old('description')}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 mt-2" id="image">
        <div class="form-group batch-form">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <label>Image <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="file" class="form-control" name="image"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 mt-2" id="image-alt">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <label>Image Alt<span
                                style="color: red;">*</span></label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   name="image_alt"
                                   value="{{old('image_alt')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
