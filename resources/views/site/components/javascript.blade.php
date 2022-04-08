
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
@include('sweetalert::alert')
<script>
    function setMessage(msg = "" , type = "error") {
        Swal.fire({
            position: 'top-end',
            icon: type,
            title: msg,
            showConfirmButton: false,
            timer: 1600
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
