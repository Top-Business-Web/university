<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets') }}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>



<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets') }}/js/core/app-menu.js"></script>
<script src="{{ asset('app-assets') }}/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets') }}/js/scripts/pages/page-auth-login.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    $(document).on('click', '.langBtn', function () {
        let url = $(this).data('url');
        location.href = url;
    })

    $('input[name="email"]').on('keyup', function () {
        let emailErr = $('.email-error');
        if ($(this).val() == '')
            emailErr.removeClass('d-none');
        else
            emailErr.addClass('d-none');
    })

    $('input[name="password"]').on('keyup', function () {
        let passwordErr = $('.password-error');
        if ($(this).val() == '')
            passwordErr.removeClass('d-none');
        else
            passwordErr.addClass('d-none');
    })

    $(document).on('click', '.btnLogin', function () {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let emailErr = $('.email-error');
        let passwordErr = $('.password-error');

        if (email == '') {
            emailErr.removeClass('d-none');
        } else if (password == '') {
            passwordErr.removeClass('d-none');
        } else {
            $.ajax({
                method: 'POST',
                url: '{{ route('login') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email,
                    'password': password,
                }, success: function (data) {
                    if (data === 200) {
                        toastr.success('{{ trans('login.Logged in successfully') }}');
                        setTimeout(function () {
                            location.href = '{{ route('admin.home') }}';
                        },2000)
                    } else if (data === 405) {
                        toastr.error('{{ trans('login.The email or password is incorrect') }}');
                    }
                }, error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value, '{{ trans('login.Error') }}');
                            });
                        }
                    });
                }
            })
        }
    })


</script>
</body>
<!-- END: Body-->

</html>
