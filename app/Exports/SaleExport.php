<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Carbon\Carbon;

class SaleExport implements FromCollection, WithHeadings, WithCustomStartCell, WithTitle, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $userId, $dateFrom, $dateTo, $reportType;

    function __construct($userId, $reportType, $f1, $f2){
        $this->userId = $userId;
        $this->reportType = $reportType;
        $this->f1 = $f1;
    }

    public function collection()
    {
        $data = [];
        if($this->reportType == 1){
            $from = Carbon::parse($this->dateFrom)->format('Y-m-d'). ' 00:00:00';
            $to = Carbon::parse($this->dateTo)->format('Y-m-d'). ' 23:59:59';
        }else {
            $from = Carbon::parse($dateFrom)->format('Y-m-d'). ' 00:00:00';
            $to = Carbon::parse($dateTo)->format('Y-m-d'). ' 23:59:59';
        }

        if($thiss->userId == 0){
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
            ->select('sales.*', 'u.name as user')
            ->whereBetween('sales.created_at', [$from, $to])
            ->get();
        }else {
            $data = Sale::join('users as u', 'sales.user_id')
            ->select('sales.*', 'u.name as user')
            ->whereBetween('sales.created_at', [$from, $to])
            ->where('user_id', $this->userId)
            ->get();
        }
        return $data;
    }
    
    public function headings(): array 
    {
        return ["DOCUMENTO N°", "IMPORTE", "ITEMS", "ESTATUS", "USUARIO", "FECHA"];
    }
    public function startCell(): string
    {
        return "A2";
    }
    public function styles(Worksheet $sheet)
    {
        return [
            2 => ['font' => ['bold' => true]]
        ];
    }
    public function title(): string
    {
        return 'Reporte de Ventas';
    }
    public function reporteExcel($userId, $reportType, $dateFrom=null, $dateTo=null){
        $reportName = 'Reporte de Ventas_'. uniqid(). '.xls';
        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo), $reportName);
    }
}
