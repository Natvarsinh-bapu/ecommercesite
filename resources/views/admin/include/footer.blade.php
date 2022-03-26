{{-- js --}}
<script src="{{ asset('superadmintheme/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('superadmintheme/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('superadmintheme/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('superadmintheme/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('superadmintheme/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('superadmintheme/scripts/klorofil-common.js') }}"></script>
{{-- js _END --}}

{{-- JS  --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; {{ \Carbon\Carbon::now()->format('Y') }} <a href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>. All Rights Reserved.</p>
    </div>
</footer>