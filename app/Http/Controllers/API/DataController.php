<?php

namespace App\Http\Controllers\API;

use App\Models\dataInOut;
use App\Events\DataDisimpan;
use App\Events\DataDisimpanBerdempet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataFrontClose;

date_default_timezone_set("Asia/Jakarta");


class DataController extends Controller
{
    public function inOut(Request $request)
    {
        $inout = new dataInOut();
        $inout->tanggal = date('Y-m-d');
        $inout->waktu = date('H:i:s');
        $inout->kondisi = $request->input('kondisi');
        $inout->jumlah = $request->input('jumlah');
        $saved = $inout->save();
        if ($saved) {
            $data = dataInOut::latest()->first();
            $jsonData = json_encode($data, JSON_UNESCAPED_SLASHES);
            DataDisimpan::dispatch($data);
            return response()->json($jsonData);
        }else{
            return 'not saved\n';
        }
    }

    public function stacked(Request $request)
    {
        $inout = new DataFrontClose();
        $inout->tanggal = date('Y-m-d');
        $inout->waktu = date('H:i:s');
        $inout->dempet_samping = $request->input('samping');
        $inout->dempet_depan = $request->input('depan');
        $saved = $inout->save();
        if ($saved) {
            $data = DataFrontClose::latest()->first();
            $jsonData = json_encode($data, JSON_UNESCAPED_SLASHES);
            DataDisimpanBerdempet::dispatch($data);
            return response()->json($jsonData);
        }else{
            return 'not saved\n';
        }
    }
}
