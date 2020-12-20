<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <script src="https://kit.fontawesome.com/9fb397285d.js" crossorigin="anonymous"></script>

    <title>{{ config('app.name') }}</title>
</head>
<body>
    @include('layouts.topnav')

    <div id="app">
        @yield('content')
    </div>

    @include('layouts.footer')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('.signature-popovers').popover({
                html: true,
                container: "body",
                trigger: "manual",
                title: "Signature Details <i class='fas fa-edit edit-signature ml-4'></i>",
                content: function() {
                    let signatureDetails = "#" + $(this).data('details');
                    
                    return $(signatureDetails).html();;
                }
            }).on('click', function(event) {
                $(this).popover('toggle');
                event.preventDefault();
            }).on('shown.bs.popover', function(event) {
                let signaturePopover = "." + $(this).data('details') + "-popover ";
                $(signaturePopover + ".edit-signature").on('click', function(event) {
                    var date = $(signaturePopover).find('.date');
                    var dateText = $(date).html();
                    var listener = $(signaturePopover).find('.listener');
                    var listenerText = $(listener).html();

                    $(date).html("<input name='sig_date' type='date' class='form-control form-control-sm' value='" + dateText + "'>");
                    $(listener).html("<input name='from_member' type='text' class='form-control form-control-sm' value='" + listenerText + "'>");

                    $(this).after("<button class='btn btn-outline-success btn-sm submit-update ml-4'>Update</button>")
                    $(this).css('display', 'none');

                    $(".submit-update").on('click', function() {
                        let data = {};

                        data.sig_date = $(signaturePopover + " input[name=sig_date]").val();
                        data.from_member = $(signaturePopover + " input[name=from_member]").val();
                        data.id = signaturePopover.split('-')[1];

                        axios.post('/signatures/' + data.id + '/edit', data)
                            .then((response) => {
                                console.log(response.data);
                                flashMessage(response.data.title, response.data.message);
                                $('.signature-popovers').popover('hide');
                            });
                    });

                });
            });
        });

        $('body').on('click', function (event) {
            if($('.popover').has(event.target).length || $('.signature-popovers').has(event.target).length) {
                
            } else {
                $('.signature-popovers').popover('hide');
            }
        });
    </script>
</body>
</html>