
<?php
$hetznerUsername = 'grademvkcv';
if (strpos(__DIR__, $hetznerUsername)) {
    // production
    require '/usr/home/' . $hetznerUsername . '/laravel/bootstrap/autoload.php';
    $app = require_once '/usr/home/' . $hetznerUsername . '/laravel/bootstrap/app.php';
} else {
    // non-production
    require __DIR__.'/../bootstrap/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
}
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);

