@extends('popup::admin.layouts.popup')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="card-title">Create Popup</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.popup.store') }}" method="post" id="popup-form" >
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="title" name="title" class="form-control" required autocomplete="title" autofocus maxlength="200">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <!-- <input type="content" name="email" class="form-control" required autocomplete="email"> -->
                            <div>
                                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" style="min-height:100px !important" autofocus required></textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" name="image" class="form-control" autocomplete="image">
                        </div>
                        <div class="form-group">
                            <label>Button</label>
                            <input type="text" name="bt_name" class="form-control"  autocomplete="bt_name">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Side modal</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                            id="formTop" value="top" autocompleted="" checked><label class="form-check-label"
                                            for="formTop"> Top </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formTopRight" value="topRight" autocompleted="" ><label class="form-check-label"
                                                for="formTopRight"> Top right </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formTopLeft" value="topLeft" autocompleted="" ><label class="form-check-label"
                                                for="formTopLeft"> Top left </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formBottomRight" value="bottomRight" autocompleted="" ><label
                                                class="form-check-label" for="formBottomRight"> Bottom right </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formBottomLeft" value="bottomLeft" autocompleted="" ><label class="form-check-label"
                                                for="formBottomLeft"> Bottom left </label></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Animation</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formAnimation"
                                                id="formAnimation" value="on" checked><label class="form-check-label" for="formAnimation"> On
                                            </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formAnimation" id="formTop"
                                                value="off" ><label class="form-check-label" for="formTop"> Off </label></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Center</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formCenter"
                                                id="formCenter" value="on" ><label class="form-check-label" for="formCenter"> On
                                            </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formCenter" id="formTop"
                                                value="off" checked><label class="form-check-label" for="formTop"> Off </label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="" class="btn btn-secondary"  data-dismiss="modal">Close</a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
// CKEDITOR.replace( 'content' );
    // jQuery Validation
    $=jQuery;
    $(function(){
        $('#popup-form').validate(
        {
            rules:{
              
            }
        }); //valdate end
    }); //function end
</script>
@endsection