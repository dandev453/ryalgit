<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Sale;
use App\Models\User;
use App\Models\SaleDetail;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function reportPDF($userId, $reportType, $dateFrom = null, $dateTo = null){
        $data = [];
        //Si las fechas son del tipo de reporte 

        //la fecha de reporte es ahora o sino es la fecha seleccionada
        if($reportType == 0){
            $from = Carbon::parse(Carbon::now())->format('Y-m-d'). ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d'). ' 23:59:59';
        }else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d'). ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d'). ' 23:59:59';
        }
            //Rerpote por usuarios desde ventas
        if($userId == 0){
            $data = Sale::join('users as u'. 'u.id', sales.user_id)
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at', [$from, $to])
            ->where('user_id', $this->userId)
            ->get();
        }
        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadview('pdf.reporte', compact('data', 'reportType', 'user','dateFrom','dateTo'));
        return $pdf->stream('salesReport.pdf');
      
    }
    public function reportTest(){
        $pdf = PDF::loadView('pdf.test');
        return $pdf->download('pdf.test');
    }
    public function reportExcel($userId, $reportType, $dateFrom=null, $dateTo=null){
        $reportName = 'Reporte de Ventas_'. uniqid(). '.xls';
        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo), $reportName);
    }
}
