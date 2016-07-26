@if(session()->has('sf_persist'))
    <script>
        sflash({
            title: "{{ session('sf_title') }}",
            text: "{{ session('sf_message') }}",
            type: "{{ session('sf_level') }}",
            allowOutsideClick: true,
            confirmButtonText: "Got it",
            showConfirmButton: true
        });
    </script>
@elseif(session()->has('sf_message'))
    <script>
        sflash({
            title: "{{ session('sf_title') }}",
            text: "{{ session('sf_message') }}",
            type: "{{ session('sf_level') }}",
            allowOutsideClick: true,
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif
@if(session()->has('sf_notice'))
    <script>
        sflash({
            type: 'notice',
            text: '{{ session('sf_notice_message') }}',
            timer: 3000
        });
    </script>
@endif
