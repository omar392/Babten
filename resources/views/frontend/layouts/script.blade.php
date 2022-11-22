
    @jquery
    @toastr_js
    @toastr_render
    <div class="go-top"><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-up"></i></div>
    <!-- All JS Links -->


    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?5505';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
      "enabled":true,
      "chatButtonSetting":{
          "backgroundColor":"#4dc247",
          "ctaText":"",
          "borderRadius":"100",
          "marginLeft":"20",
          "marginBottom":"50",
          "marginRight":"20",
          "position":"left",
          @if (app()->getLocale() == 'ar')
          "position":"rigth"
          @endif
      },
      "brandSetting":{
          "brandName":"{{ $setting->name }}",
          "brandSubTitle":"{{ $setting->brandtitle }}",
          "brandImg":"{{  asset('dashboard/' . $setting->image) }}",
          "welcomeText":"{{ $setting->welcometext }}",
          "messageText":"{{ $setting->msgtext }}",
          "backgroundColor":"#0a5f54",
          "ctaText":"{{ __('site.start') }}",
          "borderRadius":"30",
          "autoShow":false,
          "phoneNumber":"{{$setting->whatsapp}}"
      }
     };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submitt").click(function(e){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var age = $("#age").val();
            var address = $("#address").val();
            var qualifications = $("#qualifications").val();
            var phone = $("#phone").val();

            // alert(title + " " + des);

            $.ajax({
                url: "{{ route('email.order') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, address:address, phone:phone, age:age , qualifications:qualifications },
                success: function(data) {
                    // alert("done")
                    console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        toastr.success(data.success);
                        document.getElementById("employmentInfo").reset();
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
                console.log(key);
                $('.'+key+'_err').text(value);
            });
        }
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-submittt").click(function(e){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var mail = $("#mail").val();
            // alert(title + " " + des);

            $.ajax({
                url: "{{ route('email.store') }}",
                type:'POST',
                data: {_token:_token, mail:mail},
                success: function(data) {
                    // alert("done")
                    console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        toastr.success(data.success);
                        document.getElementById("emailservice").reset();
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
                console.log(key);
                $('.'+key+'_err').text(value);
            });
        }
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-submit").click(function(e){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#message").val();
            var subject = $("#subject").val();
            var recaptcha = $("#g-recaptcha-response").val();
            // alert(title + " " + des);

            $.ajax({
                url: "{{ route('contact.save') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, 'g-recaptcha-response':recaptcha, phone:phone, message:message, subject:subject},
                success: function(data) {
                    // alert("done")
                    console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        toastr.success(data.success);
                        document.getElementById("contactInfo").reset();
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
                console.log(key);
                $('.'+key+'_err').text(value);
            });
        }
    });
</script>
    @yield('scripts')


