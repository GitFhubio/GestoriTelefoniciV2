@if (Request::route()->getName() !== 'login' && Request::route()->getName() !== 'register' && Request::route()->getName() !== 'logout')

<footer-component img_path="{{ asset('my-img/logo.png') }}"></footer-component>

@endif
