<?php

use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/verify', function (Request $request) {
    $profile = Visa::where('visa_number', $request->input('visa_number'))->first();

    if ($profile) {
        // Helper function to format dates to dd.mm.yyyy
        $formatDate = function($date) {
            if (!$date) return null;

            // If it's a Carbon instance
            if ($date instanceof Carbon) {
                return $date->format('d.m.Y');
            }

            // If it's a string in custom format: 14T00:00:00.000000Z.09.2001
            if (is_string($date)) {
                $parts = explode('.', $date);

                if (count($parts) >= 3) {
                    // Extract day from first part (14T00:00:00.000000Z -> 14)
                    $day = substr($parts[0], 0, 2);
                    // Middle part is month
                    $month = $parts[1];
                    // Last part is year
                    $year = $parts[2];

                    return sprintf('%02d.%02d.%04d', $day, $month, $year);
                }

                // If it's in standard date format, parse and convert
                try {
                    $date = Carbon::parse($date);
                    return $date->format('d.m.Y');
                } catch (\Exception $e) {
                    return $date;
                }
            }

            return $date;
        };

        // Format dates in response
        $profile->date_of_birth = $formatDate($profile->date_of_birth);
        $profile->visa_validity = $formatDate($profile->visa_validity);

        return response()->json($profile);
    } else {
        return response()->json(['error' => 'Visa not found'], 404);
    }
});
