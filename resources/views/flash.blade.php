@if(session()->has('sf_persist'))
    <script>
        swal({
            title: "{{ session('sf_title') }}",
            text: "{{ session('sf_message') }}",
            type: "{{ session('sf_level') }}",
            allowOutsideClick: true,
            confirmButtonText: "Got it"
        });
    </script>
@elseif(session()->has('sf_message'))
    <script>
        swal({
            title: "{{ session('sf_title') }}",
            text: "{{ session('sf_message') }}",
            type: "{{ session('sf_level') }}",
            allowOutsideClick: true,
            timer: 2500,
            showConfirmButton: false
        });
    </script>
@endif

@if(session()->has('sf_notice'))
    <div class="sf_notice">
        <span class="sf_notice_body">{{ session('sf_notice_message') }}.</span>
    </div>

    <script id="notice_script">
        $(".sf_notice").animate({ left: '-10px' })
                .delay(2000)
                .animate({ left: '-500px' });
        setTimeout(function () {
            $(".sf_notice").remove();
        }, 3000);
        $("#notice_script").remove();
    </script>
@endif
