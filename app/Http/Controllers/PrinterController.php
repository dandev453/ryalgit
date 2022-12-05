<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

use Carbon\Carbon;
use App\Models\SaleDetails;
use App\Models\Sale;
use App\Models\User;



class PrinterController extends Controller
{
    public function TicketVenta(Request $request)
    {
        $folio = str_pad($request->id,7,"0",STR_PAD_LEFT);
        $nombreImpresora = "XP-58"; //nombre impresora a usar
        $connector = new WindowsPrintConnector($nombreImpresora); //imp. a conecar
        $impresora = new Printer($connector);

        //obtenerinfo de la db
        $user =User::all();
        $sale = Sale::find($request->id);

        //info del ticket
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(2,2);
        $impresora->setTextSize(1,1);
        $impresora->text('** Recibo de venta ** \n\n');

        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("=================================================\n");
        
       
        $impresora->text("=================================================\n");

        //footer
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("Por favor consevar el ticket hasta el pago, en caso de extravío paragá multa de $50.00");

        $impresora->selectPrintMode();
        $impresora->setBarcodeHeight(80); //altura del  barcode
        $impresora->barcode($folio, Printer::BARCODE_CODE39); // especificamos   el estandar barcode a imprimir
        $impresora->feed(2); // agregamos 2 saltos de linea

        $impresora->text("Gracias por su preferencia");
        $impresora->text("Thank you!");
        $impresora->feed(3);
        $impresora->cut();
        $impresora->close();
    }
}
