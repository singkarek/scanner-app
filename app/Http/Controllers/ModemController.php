<?php

namespace App\Http\Controllers;

use App\Models\Modem;
use App\Models\TypeModem;
use App\Models\VersiModem;
use Illuminate\Http\Request;

class ModemController extends Controller
{
    public function create()
    {
        $type = TypeModem::all();
        $versi = VersiModem::all();
        return view('index', [
            'types' => $type,
            'versions' => $versi
        ]);
    }
    public function store(Request $request)
    {
        // @dd($request->all());
        $modems = $request->get('modem');
        // @dd($modems);
        foreach ($modems as $modem) {
            $data = [
                'sn_modem' => $modem['sn'],
                // 'versi' => $modem['versi']
            ];
            Modem::create($data);
        }
        return redirect()->back();
    }
}
