<footer class="footer">
    <div class="container">
        <div class="row" style="display: none;">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">                        
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="{{ url('/') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 100px;">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©{{ \Carbon\Carbon::now()->format('Y') }} {{ config('app.name') }} All Rights Reserverd. <i class="fa fa-heart-o" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</footer>