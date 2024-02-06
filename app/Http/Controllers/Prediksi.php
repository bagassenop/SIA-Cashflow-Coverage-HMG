<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrediksiModel;

class Prediksi extends Controller
{
    public function index(){
        return view('konten.prediksi');
    }

    public function NaiveBayes(Request $request){
        $dataPrediksi = PrediksiModel::all();
        $totalData = $dataPrediksi->count();
        $totalAman = $dataPrediksi->where('kondisiaruskas', 'Aman')->count();
        $totalTidakAman = $dataPrediksi->where('kondisiaruskas', 'Tidak Aman')->count();

        $totalLiquid = $dataPrediksi->where('liquiditas', 'Liquid');
        $totalIliquid = $dataPrediksi->where('liquiditas', 'Iliquid');
        $liquidAman =  $totalLiquid->where('kondisiaruskas', 'Aman')->count();
        $liquidTidakAman = $totalLiquid->where('kondisiaruskas', 'Tidak Aman')->count();
        $iliquidAman = $totalIliquid->where('kondisiaruskas', 'Aman')->count();
        $iliquidTidakAman = $totalIliquid->where('kondisiaruskas', 'Tidak Aman')->count();

        $totalCashFlowTidakBaik = $dataPrediksi->where('cashflowcoverage', 'Tidak Baik');
        $totalCashFlowStandar = $dataPrediksi->where('cashflowcoverage', 'Standar');
        $totalCashFlowBaik = $dataPrediksi->where('cashflowcoverage', 'Baik');
        $CashFlowTidakBaikAman =  $totalCashFlowTidakBaik->where('kondisiaruskas', 'Aman')->count();
        $CashFlowTidakBaikTidakAman =  $totalCashFlowTidakBaik->where('kondisiaruskas', 'Tidak Aman')->count();
        $CashFlowStandarAman = $totalCashFlowStandar->where('kondisiaruskas', 'Aman')->count();
        $CashFlowStandarTidakAman = $totalCashFlowStandar->where('kondisiaruskas', 'Tidak Aman')->count();
        $CashFlowBaikAman =  $totalCashFlowBaik->where('kondisiaruskas', 'Aman')->count();
        $CashFlowBaikTidakAman =  $totalCashFlowBaik->where('kondisiaruskas', 'Tidak Aman')->count();

        $totalRPPTidakBaik = $dataPrediksi->where('perputaranpiutang', 'Tidak Baik');
        $totalRPPStandar = $dataPrediksi->where('perputaranpiutang', 'Standar');
        $totalRPPBaik = $dataPrediksi->where('perputaranpiutang', 'Baik');
        $RPPTidakBaikAman =  $totalRPPTidakBaik->where('kondisiaruskas', 'Aman')->count();
        $RPPTidakBaikTidakAman =  $totalRPPTidakBaik->where('kondisiaruskas', 'Tidak Aman')->count();
        $RPPStandarAman = $totalRPPStandar->where('kondisiaruskas', 'Aman')->count();
        $RPPStandarTidakAman = $totalRPPStandar->where('kondisiaruskas', 'Tidak Aman')->count();
        $RPPBaikAman =  $totalRPPBaik->where('kondisiaruskas', 'Aman')->count();
        $RPPBaikTidakAman =  $totalRPPBaik->where('kondisiaruskas', 'Tidak Aman')->count();

        $PL = $totalLiquid->count() /  $totalData;
        $PIL = $totalIliquid->count() /  $totalData;
        $PLA = $totalAman / $totalData;
        $PILTA = $totalTidakAman / $totalData;

        $PCFB = $totalCashFlowBaik->count() /  $totalData;
        $PCFS = $totalCashFlowStandar->count() /  $totalData;
        $PCFTB = $totalCashFlowTidakBaik->count() /  $totalData;
        $PCFA = $totalAman / $totalData;
        $PCFTA = $totalTidakAman / $totalData;
// dd($PCFTB, $totalCashFlowTidakBaik->count(), $totalData);
        $PRPPB = $totalRPPBaik->count() /  $totalData;
        $PRPPS = $totalRPPStandar->count() /  $totalData;
        $PRPPTB = $totalRPPTidakBaik->count() /  $totalData;
        $PRPPA = $totalAman / $totalData;
        $PRPPTA = $totalTidakAman / $totalData;

        // dd($request);
        if ($request->rasio_kas_kewajiban_lancar == 'Liquid') {
            $hitungAAman = $liquidAman;
            $hitungATidakAman = $liquidTidakAman;
            $pembagiA = $PL;
        } elseif ($request->rasio_kas_kewajiban_lancar == 'iliquid') {
            $hitungAAman = $iliquidAman;
            $hitungATidakAman = $iliquidTidakAman;
            $pembagiA = $PIL;
        }

        if ($request->rasio_kas_terhadap_total_hutang == 'Baik') {
            $hitungBAman = $CashFlowBaikAman;
            $hitungBTidakAman = $CashFlowBaikTidakAman;
            $pembagiB = $PCFB;
        } elseif ($request->rasio_kas_terhadap_total_hutang == 'Standar') {
            $hitungBAman = $CashFlowStandarAman;
            $hitungBTidakAman = $CashFlowStandarTidakAman;
            $pembagiB = $PCFS;
        } elseif ($request->rasio_kas_terhadap_total_hutang == 'Tidak Baik') {
            $hitungBAman = $CashFlowTidakBaikAman;
            $hitungBTidakAman = $CashFlowTidakBaikTidakAman;
            $pembagiB = $PCFTB;
        }

        if ($request->rasio_perputaran_piutang == 'Baik') {
            $hitungCAman = $RPPBaikAman;
            $hitungCTidakAman = $RPPBaikTidakAman;
            $pembagiC = $PRPPTB;
        } elseif ($request->rasio_perputaran_piutang == 'Standar') {
            $hitungCAman = $RPPStandarAman;
            $hitungCTidakAman = $RPPStandarTidakAman;
            $pembagiC = $PRPPTB;
        } elseif ($request->rasio_perputaran_piutang == 'Tidak Baik') {
            $hitungCAman = $RPPTidakBaikAman;
            $hitungCTidakAman = $RPPTidakBaikTidakAman;
            $pembagiC = $PRPPTB;
        }

        $PAman = ((($hitungAAman / $totalAman)*($hitungBAman / $totalAman)*($hitungCAman / $totalAman))*($totalAman / $totalData)) / (($pembagiA)*($pembagiB)*($pembagiC));
        $PTidakAman = ((($hitungATidakAman / $totalTidakAman)*($hitungBTidakAman / $totalTidakAman)*($hitungCTidakAman / $totalTidakAman))*($totalTidakAman / $totalData)) / (($pembagiA)*($pembagiB)*($pembagiC));
        // dd($PAman, $PTidakAman );
        return view('konten.hasilprediksi', compact('PAman', 'PTidakAman'));
    }
}
