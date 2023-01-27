<div class="form-group">
    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">></div>
</div>
<script src="https://www.google.com/recaptcha/api.js"></script>
@if ($errors->has('g-recaptcha-response'))
<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
@endif
