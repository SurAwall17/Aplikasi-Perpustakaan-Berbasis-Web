<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function finish(Request $request)
    {
        $orderId = $request->order_id;

        // Cek dan update status jika belum diubah lewat callback
        $denda = Denda::where('order_id', $orderId)->first();

        if ($denda && $denda->status !== 'Sudah Dibayar') {
            $denda->status = 'Sudah Dibayar';
            $denda->save();
        }

        return redirect()->route('filament.admin.resources.dendas.index')->with('success', 'Pembayaran berhasil!');
    }

}
