<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

use Carbon\Carbon;
use App\SaleDetail;
use App\Sale;
use App\User;



class PrinterController extends Controller
{
    public function TicketVenta(Request $request)
    {
        $folio = str_pad($request->id,7,"0",STR_PAD_LEFT);
        $nombreImpresora = "TM20"; //nombre impresora a usar
        $connector = new WindowsPrintConnector($nombreImpresora); //imp. a conecar
        $impresora = new Printer($connector);

        //obtenerinfo de la db
        $user =User::all();
        $sale = Sale::find($request->id);
        $tarifa = SaleDetail::find($request->sale_id);

        //info del ticket
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(2,2);
        $impresora->text(strtoupper($user->name));
        $impresora->setTextSize(1,1);
        $impresora->text('** Recibo de venta ** \n\n');

        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("=================================================\n");
        $impresora->text("Entrada: ". Carbon::parse($sale->created_at)->format('d/m/Y h:m:s') . "\n");
        $impresora->text("Total: $".number_format($sale->total,2) . "\n");
        if (!emty($sale->descripcion)) $impresora->text("Desc: ". $sale->descripcion ."\n");
        $impresora->text("=================================================\n");

        //footer
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("Por favor consevar el ticket hasta el pago, en caso de extravío paragá multa de $50.00");

        $impresora->selectPrintMode();
        $impresora->setBarcodeHeight(80); //altura del  barcode
        $impresora->barcode($folio, Printer::BARCODE_CODE39); // especificamos   el estandar barcode a imprimir
        $impresora->feed(2); // agregamos 2 saltos de linea

        $impresora->text("Gracias por su preferencia");
        $impresora->text("Thabk you!");
        $impresora->feed(3);
        $impresora->cut();
        $impresora->close();
    }
}
