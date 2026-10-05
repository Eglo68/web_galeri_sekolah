<?php
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Token untuk operasi tulis (butuh trait HasApiTokens di App\Models\User)
Route::post('login', function (Request $r) {
    $c = $r->validate(['email' => 'required|email', 'password' => 'required']);
    if (!Auth::validate($c)) return response()->json(['message' => 'Kredensial salah'], 422);
    return ['token' => User::where('email', $c['email'])->first()->createToken('api')->plainTextToken];
});

$res = 'articles|products|galleries';
Route::get('{resource}', [ApiController::class, 'index'])->where('resource', $res);
Route::get('{resource}/{key}', [ApiController::class, 'show'])->where('resource', $res);
Route::middleware('auth:sanctum')->group(function () use ($res) {
    Route::post('{resource}', [ApiController::class, 'store'])->where('resource', $res);
    Route::match(['put', 'patch'], '{resource}/{key}', [ApiController::class, 'update'])->where('resource', $res);
    Route::delete('{resource}/{key}', [ApiController::class, 'destroy'])->where('resource', $res);
});
