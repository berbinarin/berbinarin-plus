<h2>Halo, {{ $user->first_name }}!</h2>
<p>Selamat! Pembayaran Anda untuk pendaftaran Berbinar+ telah kami verifikasi.</p>
<p>Berikut adalah akun Anda untuk mengakses platform:</p>
<ul>
    <li><strong>Username:</strong> {{ $user->username }}</li>
    <li><strong>Password:</strong> {{ $password }}</li>
</ul>
<p>Silakan login di tautan berikut: <a href="{{ url('/login') }}">Login Berbinar+</a></p>
<p>Jangan berikan kredensial ini kepada siapa pun.</p>