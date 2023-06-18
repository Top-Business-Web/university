<script>
    /**
     * checkRead
     * startBtn
     * transportation method
     * first name
     * last name
     * mail address
     * company name
     * */

    // checkRead input check method

    $(document).ready(function () {
        let checkRead = $('#checkRead');
        let startBtn = $('#startBtn');
        if (checkRead.is(':checked')) {
            startBtn.removeClass('disabled').prop('disabled', false);
        } else {
            startBtn.addClass('disabled').prop('disabled', true);
        }
    });

    // checkRead input check method
    $(document).on('click', '#checkRead', function () {
        let startBtn = $('#startBtn');
        if ($(this).is(':checked')) {
            startBtn.removeClass('disabled').prop('disabled', false);
        } else {
            startBtn.addClass('disabled').prop('disabled', true);
        }
    });

    // validate input email address
    $(document).ready(function () {
        $('input[name="mail_address"]').blur(function () {
            let email = $('input[name="mail_address"]').val();
            let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let error = $('#errorEmail');
            if (!regex.test(email)) {
                error.text('Invalid email format');
                $('input[name="mail_address"]').val('');
                $('input[name="mail_address"]').focus();
            } else {
                error.text('');
            }
        });
    });

    $(document).mousemove(function () {

        // =================================================================================
        // start part 1
        // =================================================================================

        let btnCon1 = $('#btnCon1');
        let firstName = $('input[name="first_name"]').val();
        let lastName = $('input[name="last_name"]').val();
        let mailAddress = $('input[name="mail_address"]').val();
        let companyName = $('input[name="company_name"]').val();
        let select1 = [];
        let select2 = [];

        // get list of transactions
        $('input[name="select1[]"]:checked').each(function () {
            select1.push($(this).val());
        });
        // get list of scenario
        $('input[name="select2[]"]:checked').each(function () {
            select2.push($(this).val());
        });

        if (firstName == '' || lastName == '' || mailAddress == '' || companyName == '' || select2 == '' || select1 == '') {
            btnCon1.prop('disabled', true);
            btnCon1.addClass('disabled');
        } else {
            btnCon1.prop('disabled', false);
            btnCon1.removeClass('disabled');
        }

        // =================================================================================
        // start part 2
        // =================================================================================

        let btnCon2 = $('#btnCon2');
        let select3 = $('select[name="select3"]').val();
        let WindParkSize = $('input[name="WindParkSize"]').val();
        let select4 = $('select[name="select4"]').val();
        let FullLoadHours = $('input[name="FullLoadHours"]').val();
        let OffshorePlatformAmount = $('input[name="OffshorePlatformAmount"]').val();
        let select5 = $('select[name="select5"]').val();
        let NewTurbineName = $('input[name="NewTurbineName"]').val();
        let NewTurbineSize = $('input[name="NewTurbineSize"]').val();

        if (select3 == '' || WindParkSize == '' || select4 == '' || FullLoadHours == '' || OffshorePlatformAmount == '' || select5 == '' || NewTurbineName == '' || NewTurbineSize == '') {
            btnCon2.prop('disabled', true);
            btnCon2.addClass('disabled');
        } else {
            btnCon2.prop('disabled', false);
            btnCon2.removeClass('disabled');
        }

        // =================================================================================
        // start part 3
        // =================================================================================

        let btnCon3 = $('#btnCon3');
        let select6 = $('select[name="select6"]').val();
        let select7 = $('select[name="select7"]').val();
        let select8 = $('select[name="select8"]').val();
        let select9 = $('select[name="select9"]').val();
        let select10 = $('select[name="select10"]').val();
        let select11 = $('select[name="select11"]').val();

        if (select6 == '' || select7 == '' || select8 == '' || select9 == '' || select10 == '' || select11 == '') {
            btnCon3.prop('disabled', true);
            btnCon3.addClass('disabled');
        } else {
            btnCon3.prop('disabled', false);
            btnCon3.removeClass('disabled');
        }

        // =================================================================================
        // start part 3
        // =================================================================================

        let btnCon4 = $('#btnCon4');
        let select13 = $('input[name="select13"]:checked').val();
        let StorageSizeShip = $('input[name="StorageSizeShip"]').val();
        let StorageSizePlatform = $('input[name="StorageSizePlatform"]').val();
        let select12  = $('select[name="select12"]').val();
        let StorageSizePort = $('input[name="StorageSizePort"]').val();
        let OperatingTimePort = $('input[name="OperatingTimePort"]').val();

        if (select13 == '' || StorageSizeShip == '' || StorageSizePlatform == '' || select12 == '' || StorageSizePort == '' || OperatingTimePort == '') {
            btnCon4.prop('disabled', true);
            btnCon4.addClass('disabled');
        } else {
            btnCon4.prop('disabled', false);
            btnCon4.removeClass('disabled');
        }
    })


    // =================================================================================
    // start btnCon1
    // =================================================================================
    $(document).on('click', '#btnCon1', function () {
        // value declared
        let firstName = $('input[name="first_name"]').val();
        let lastName = $('input[name="last_name"]').val();
        let mailAddress = $('input[name="mail_address"]').val();
        let companyName = $('input[name="company_name"]').val();
        let select1 = [];
        let select2 = [];

        // get list of transactions
        $('input[name="select1[]"]:checked').each(function () {
            select1.push($(this).val());
        });
        // get list of scenario
        $('input[name="select2[]"]:checked').each(function () {
            select2.push($(this).val());
        });

        // output
        var result1 = {
            "firstName": firstName,
            "lastName": lastName,
            "mailAddress": mailAddress,
            "companyName": companyName,
            "select1": select1,
            "select2": select2,

        };
        console.log(result1);
    });

    // =================================================================================
    // start  btnCon2
    // =================================================================================
    $(document).on('click', '#btnCon2', function () {

        let select3 = $('select[name="select3"]').val();
        let WindParkSize = $('input[name="WindParkSize"]').val();
        let select4 = $('select[name="select4"]').val();
        let FullLoadHours = $('input[name="FullLoadHours"]').val();
        let OffshorePlatformAmount = $('input[name="OffshorePlatformAmount"]').val();
        let select5 = $('select[name="select5"]').val();
        let NewTurbineName = $('input[name="NewTurbineName"]').val();
        let NewTurbineSize = $('input[name="NewTurbineSize"]').val();

        // output
        var result2 = {
            "select3": select3,
            "WindParkSize": WindParkSize,
            "select4": select4,
            "FullLoadHours": FullLoadHours,
            "OffshorePlatformAmount": OffshorePlatformAmount,
            "select5": select5,
            "NewTurbineName": NewTurbineName,
            "NewTurbineSize": NewTurbineSize,
        };
        console.log(result2);

    });

    // =================================================================================
    // start btnCon3
    // =================================================================================
    $(document).on('click', '#btnCon3', function () {
        let select6 = $('select[name="select6"]').val();
        let select7 = $('select[name="select7"]').val();
        let select8 = $('select[name="select8"]').val();
        let select9 = $('select[name="select9"]').val();
        let select10 = $('select[name="select10"]').val();
        let select11 = $('select[name="select11"]').val();

        // output
        var result3 = {
            "select6" : select6,
            "select7" : select7,
            "select8" : select8,
            "select9" : select9,
            "select10" : select10,
            "select11" : select11,
        };
        console.log(result3);
    });

    // =================================================================================
    // start btnCon4
    // =================================================================================
    $(document).on('click', '#btnCon4', function () {
        let select13 = $('input[name="select13"]:checked').val();
        let StorageSizeShip = $('input[name="StorageSizeShip"]').val();
        let StorageSizePlatform = $('input[name="StorageSizePlatform"]').val();
        let select12  = $('select[name="select12"]').val();
        let StorageSizePort = $('input[name="StorageSizePort"]').val();
        let OperatingTimePort = $('input[name="OperatingTimePort"]').val();

        // output
        var result4 = {
            "select13" : select13,
            "StorageSizeShip" : StorageSizeShip,
            "StorageSizePlatform" : StorageSizePlatform,
            "select12" : select12,
            "StorageSizePort" : StorageSizePort,
            "OperatingTimePort" :OperatingTimePort ,
        };
        console.log(result4);
    });

</script>


<!-- range input -->
<script>
    document.querySelectorAll(".__range-step").forEach(function (ctrl) {
        var el = ctrl.querySelector('input');
        var output = ctrl.querySelector('output');
        var newPoint, newPlace, offset;
        el.oninput = function () {
            // colorize step options
            ctrl.querySelectorAll("option").forEach(function (opt) {
                if (opt.value <= el.valueAsNumber)
                    opt.style.backgroundColor = '#019992';
                else
                    opt.style.backgroundColor = '#aaa';
            });
            // colorize before and after
            var valPercent = (el.valueAsNumber - parseInt(el.min)) / (parseInt(el.max) - parseInt(el.min));
            var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop(' +
                valPercent + ', #019992), color-stop(' +
                valPercent + ', #aaa));';
            el.style = style;

            // Popup
            if ((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1) {
                var selectedOpt = ctrl.querySelector('option[value="' + el.value + '"]');
                output.innerText = selectedOpt.text;
                output.style.left = "50%";
                output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth / 2) - output.offsetWidth / 2) + 'px';
            }
        };
        el.oninput();
    });

    window.onresize = function () {
        document.querySelectorAll(".__range").forEach(function (ctrl) {
            var el = ctrl.querySelector('input');
            el.oninput();
        });
    };
</script>
<!-- range input -->
