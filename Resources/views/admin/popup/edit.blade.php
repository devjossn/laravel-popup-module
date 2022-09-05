@extends('popup::admin.layouts.popup')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="card-title">Edit Popup</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.popup.update', ['popup' => $popup->id]) }}" method="post"  id="popup-form" >
                    <input type="text" name="id" value="{{ $popup->id }}" class="form-control" required hidden>

                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $popup->title }}" class="form-control" required autocomplete="name" autofocus maxlength="200">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <!-- <input type="text" name="content" value="{{ $popup->content }}" class="form-control" required> -->
                            <div>
                                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" style="min-height:100px !important;"  autofocus required >{{ $popup->content }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="text" name="image" value="{{ $popup->image }}" class="form-control"  autocomplete="image">
                        </div>
                        <div class="form-group">
                            <label>Button</label>
                            <input type="text" name="bt_name" value="{{ $popup->bt_name }}" class="form-control"  autocomplete="bt_name">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Side modal</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                            id="formTop" value="top" autocompleted="" @if ( $popup->side=='top') checked @endif><label class="form-check-label"
                                            for="formTop"> Top </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formTopRight" value="topRight" autocompleted="" @if ( $popup->side=='topRight') checked @endif><label class="form-check-label"
                                                for="formTopRight"> Top right </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formTopLeft" value="topLeft" autocompleted="" @if ( $popup->side=='topLeft') checked @endif><label class="form-check-label"
                                                for="formTopLeft"> Top left </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formBottomRight" value="bottomRight" autocompleted="" @if ( $popup->side=='bottomRight') checked @endif><label
                                                class="form-check-label" for="formBottomRight"> Bottom right </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formRegularPosition"
                                                id="formBottomLeft" value="bottomLeft" autocompleted="" @if ( $popup->side=='bottomLeft') checked @endif><label class="form-check-label"
                                                for="formBottomLeft"> Bottom left </label></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Animation</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formAnimation"
                                                id="formAnimation" value="on" @if ( $popup->animation=='on') checked @endif><label class="form-check-label" for="formAnimation"> On
                                            </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formAnimation" id="formTop"
                                                value="off" @if ( $popup->animation=='off') checked @endif><label class="form-check-label" for="formTop"> Off </label></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div>
                                        <p class="mb-2"><strong>Center</strong></p>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formCenter"
                                                id="formCenter" value="on" @if ( $popup->v_center=='on') checked @endif ><label class="form-check-label" for="formCenter"> On
                                            </label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="formCenter" id="formTop"
                                                value="off" @if ( $popup->v_center=='off') checked @endif><label class="form-check-label" for="formTop"> Off </label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >Update</button>
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
    $(function(){
        $('#popup-form').validate(
        {
            rules:{
              
            }
        }); //valdate end
    }); //function end
</script>
@endsection