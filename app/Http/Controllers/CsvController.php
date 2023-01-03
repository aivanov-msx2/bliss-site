<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use App\Exports\WinesExport;
use App\Exports\WinePricesExport;
use App\Exports\EcommerceExport;
use App\Imports\WinesImport;
use App\Imports\WinePricesImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Excel;

class CsvController extends Controller
{

    /**
     * Download a CSV file of all Wines
     *
     * @return \Illuminate\Http\Response
     */
    public function csvWineDownload()
    {
        try {

            $filename = "wines-" . date('Ymdhi') . ".csv";

            return (new WinesExport)->download($filename);

       
        } catch (\Exception $error) {

            dd($error);

            Log::info("Error generating csv file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }

    /**
     * Upload a CSV file of Wines
     *
     * @return \Illuminate\Http\Response
     */
    public function csvWineUpload(Request $request)
    {
        try {

            Excel::import(new WinesImport, request()->file('csv'));

            return redirect()->back()->with('message', 'Wines updated successfully');
       
        } catch (\Exception $error) {

            dd($error);
            Log::info("Error uploading csv file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error uploading the file. Check logs for details.');

        }
    }

    /**
     * Download a CSV file of all Prices
     *
     * @return \Illuminate\Http\Response
     */
    public function csvPricesDownload()
    {
        try {

            $filename = "prices-" . date('Ymdhi') . ".csv";
            
            return (new WinePricesExport)->download($filename);
       
        } catch (\Exception $error) {

            dd($error);

            Log::info("Error generating csv file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }

    /**
     * Upload a CSV file of Prices
     *
     * @return \Illuminate\Http\Response
     */
    public function csvPricesUpload(Request $request)
    {
        try {

            Excel::import(new WinePricesImport, request()->file('csv'));

            return redirect()->back()->with('message', 'Prices updated successfully');
       
        } catch (\Exception $error) {

            dd($error);
            Log::info("Error uploading csv file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error uploading the file. Check logs for details.');

        }
    }
   


    /**
     * Download a CSV file of eCommerce Inventory
     *
     * @return \Illuminate\Http\Response
     */
    public function csvECommerceDownload()
    {
        try {

            $filename = "ecommerce-inventory-" . date('Ymdhi') . ".csv";
            
            return (new EcommerceExport)->download($filename);
       
        } catch (\Exception $error) {

            dd($error);

            Log::info("Error generating csv file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }

}
