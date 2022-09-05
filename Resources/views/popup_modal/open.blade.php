
<div class="modal {{$data->pos_val}} {{$data->ani_val}}" id="popupModal" role="dialog" >
    <div class="modal-dialog {{$data->pos_sub_val}} {{$data->center_val}}" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cookiesContent" id="cookiesPopup">
                    <button class="close" data-dismiss="modal">✖</button>
                    @if ($data && $data->image)
                        <img src="{{$data->image}}" alt="cookies-img" />
                    @endif

                    @if ($data && $data->content)
                        <p>{{$data->content}}</p>
                    @endif
                    
                    @if ($data && $data->bt_name)
                        <button class="accept" data-dismiss="modal">{{$data->bt_name}}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Laravel Mix - CSS File --}}
<link rel="stylesheet" href="{{ mix('css/mdb/mdb.min.css') }}"> 
<link rel="stylesheet" href="{{ mix('css/popup.css') }}"> 

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

{{-- Laravel Mix - JS File --}}
<script src="{{ mix('js/popup.js') }}"></script> 

<script>
    // $(function() {
    //     $('#popupModal').modal({
    //         show: true
    //     });
    // });
</script>
