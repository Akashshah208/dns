<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LookupDataController extends Controller
{
    //
    public function mxLookupData(Request $request)
    {
        if (!empty($request->all())) {
            $domain = $request->domain_name;
            $mxLookupData = dns_get_record($domain, DNS_MX);
            $ip = dns_get_record($domain, DNS_A + DNS_AAAA);
        } else {
            $domain = null;
            $mxLookupData = null;
            $ip = null;
        }
        /*$ip6 = dns_get_record($domain, DNS_AAAA);
        $mxLookupData = dns_get_record($domain, DNS_TXT);
        $mxLookupData = dns_get_record($domain, DNS_NS);*/
//        dd($mxLookupData, $ip);
        return view('index', compact('mxLookupData', 'domain', 'ip'));
    }
}
