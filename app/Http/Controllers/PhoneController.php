<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain\Services\PhoneService;
use App\Domain\Services\CountryService;

class PhoneController extends Controller
{
    private $phoneService;
    private $countryService;

    public function __construct(PhoneService $phoneService, CountryService $countryService)
    {
        $this->phoneService = $phoneService;
        $this->countryService = $countryService;
    }

    public function index(Request $request)
    {
        $countryCode = $request->query('countryCode');
        $valid = $request->query('valid');
        if ($valid) {
            $valid = $valid === 'true' ? true : false;
        }

        $filterBy = compact('countryCode', 'valid');
        $phones = $this->phoneService->listFiltered($filterBy);

        $countries = $this->countryService->list();

        return view('phones', [
            'phones' => $phones,
            'countries' => $countries
        ]);
    }
}
