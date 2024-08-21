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
            Log::info("Starting CSV download: " . $filename);

            $export = new WinesExport;
            return $export->download($filename);
        } catch (\Exception $error) {
            Log::error("Error generating csv file: " . $error->getMessage());
            Log::error("Stack trace: " . $error->getTraceAsString());

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Please try again later.');
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
            $file = $request->file('csv');
            
            if (!$file) {
                throw new \Exception('No file was uploaded.');
            }

            Log::info("Starting CSV import for file: " . $file->getClientOriginalName());

            Excel::import(new WinesImport, $file);

            Log::info("CSV import completed successfully.");
            return redirect()->back()->with('message', 'Wines updated successfully');
        } catch (\Exception $error) {
            Log::error("Error uploading csv file: " . $error->getMessage());
            Log::error("Stack trace: " . $error->getTraceAsString());

            return redirect()->back()->with('error', 'Sorry, there was an error uploading the file. Please check the file format and try again.');
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
            Log::error("Error generating csv file: " . $error->getMessage());
            Log::error("Stack trace: " . $error->getTraceAsString());

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
            Log::error("Error uploading csv file: " . $error->getMessage());
            Log::error("Stack trace: " . $error->getTraceAsString());

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
            Log::error("Error generating csv file: " . $error->getMessage());
            Log::error("Stack trace: " . $error->getTraceAsString());

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');
        }
    }
}
