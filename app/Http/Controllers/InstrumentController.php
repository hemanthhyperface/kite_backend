<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruments = Instrument::all();
        if ($instruments) {
            return response()->json(['instruments' => $instruments]);
        } else {
            return response(0);
        }
    }

    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }

            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv()
    {
        if (($handle = fopen(public_path() . '\instruments.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $x = new Instrument;
                $x->short_id = $data[0];
                $x->instrument_name = $data[1];
                $x->exchange = 'NSE';
                $x->cmp = rand(100,1000);
                $x->high = rand(100,1000);
                $x->low = rand(100,1000);
                $x->open = rand(100,1000);
                $x->close = rand(100,1000);
                $x->save();

            }
            fclose($handle);
        }

        // echo ($data);
        // for ($i = 0; $i < count($customerArr); $i ++)
        // {
        //     $x = new Instrument;
        //     $x->instrument_name = $customerArr[$i]['company'];
        //     $x->short_id = $customerArr[$i]['SYMBOL'];
        //     $x->exchange = 'NSE';
        //     $x->short_id = 0;
        //     $x->cmp = 0;
        //     $x->high = 0;
        //     $x->low = 0;
        //     $x->open = 0;
        //     $x->close = 0;
        //     $x->save();
        // }

        return 'Jobi done or what ever';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrument $instrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        //
    }
}
