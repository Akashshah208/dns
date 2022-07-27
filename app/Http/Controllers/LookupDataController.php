<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LookupDataController extends Controller
{
    //
    public function mxLookupData(Request $request)
    {
        $domain = $request->domain_name;
        $mxLookupData = dns_get_record($domain, DNS_MX);
//        $mxLookupData = dns_get_record($domain, DNS_A+DNS_AAAA);
//        $mxLookupData = dns_get_record($domain, DNS_AAAA);
//        $mxLookupData = dns_get_record($domain, DNS_TXT);
//        $mxLookupData = dns_get_record($domain, DNS_NS);
        return view('index', ['mxLookupData' => $mxLookupData, 'domain' => $domain]);
    }
}
