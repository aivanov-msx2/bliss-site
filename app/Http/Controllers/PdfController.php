<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Country;
use App\Models\Wine;
use PDF;

class PdfController extends Controller
{

    const PRICEBOOK_VIEW = 'pdf.priceBook.page';
    const SPEC_SHEET_VIEW = 'pdf.specSheet.specSheet';
    const SHELF_TALKER_VIEW = 'pdf.shelfTalker.shelfTalker';

    /**
     * Download a pdf of the Distributor PriceBook
     *
     * @return \Illuminate\Http\Response
     */
    public function pricebookDistributor()
    {
        try {

            $query = Country::whereHas('regions.wineries', $filter = function ($query) {
                $query->where('hide_from_dist_price_book', '=', '0');
            })->with(['regions.wineries' => $filter])->orderBy('name');

            $distributorCountries = $query->get();

            $pdf = PDF::loadView(PdfController::PRICEBOOK_VIEW, 
                [
                    'countries' => $distributorCountries, 
                    'bookType' => 'distributor'
                ]
            );
            $fileName = "DistributorPriceBook_" .date('Ymdhi'). ".pdf";

            return $pdf->download($fileName);
            

        } catch (\Exception $error) {

            Log::info("Error generating pdf file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }
    /**
     * Download a pdf of the Wholesale PriceBook
     *
     * @return \Illuminate\Http\Response
     */
    public function pricebookWholesale()
    {
        try {

            
            $query = Country::whereHas('regions.wineries', $filter = function ($query) {
                $query->where('hide_from_wholesale_price_book', '=', '0');
            })->with(['regions.wineries' => $filter])->orderBy('name');
            
            $wholesaleCountries = $query->get();

            $pdf = PDF::loadView(PdfController::PRICEBOOK_VIEW, 
                [
                    'countries' => $wholesaleCountries, 
                    'bookType' => 'wholesale'
                ]
            );
            $fileName = "WholesalePriceBook_" .date('Ymdhi'). ".pdf";
            return $pdf->download($fileName);

        } catch (\Exception $error) {

            dd($error);
            Log::info("Error generating pdf file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file.');

        }
    }


    /**
     * Return a PDF of a the selected wine shelfTalker
     *
     * @return \Illuminate\Http\Response
     */
    public function specSheet($winerySlug, $wineSlug)
    {
        try {
            $wine = Wine::getPublicWineBySlug($wineSlug);
            if (!$wine) {
                abort(404);
            }

            $wineryImg = 'assets/img/_managed_content/' . $wine->winery->winery_image_file;
            $wineImg = 'assets/img/_managed_content/' . $wine->image_file;

            $pdf = PDF::loadView(PdfController::SPEC_SHEET_VIEW, 
            [
                'wine' => $wine, 
                'wineImg' => $wineImg,
                'wineryImg' => $wineryImg,
            ]
        );
        $fileName = "specSheet_".$wineSlug."-".date('Ymdhi'). ".pdf";
        return $pdf->download($fileName);


        } catch (\Exception $error) {

            Log::info("Error generating pdf file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }


    /**
     * Return a PDF of a the selected wine shelfTalker
     *
     * @return \Illuminate\Http\Response
     */
    public function shelfTalker($winerySlug, $wineSlug, $showBottleImage)
    {
        try {
            $wine = Wine::getPublicWineBySlug($wineSlug);
            if (!$wine) {
                abort(404);
            }

            $showBottleImage = ($showBottleImage == 1) ? true : false;

            $pdf = PDF::loadView(PdfController::SHELF_TALKER_VIEW, 
            [
                'wine' => $wine, 
                'showBottleImage' => $showBottleImage,
                'wineImg' => $wine->getWineImage(),
            ]
        );
        $fileName = "shelfTalker_".$wineSlug."-".date('Ymdhi'). ".pdf";
        return $pdf->download($fileName);


        } catch (\Exception $error) {

            Log::info("Error generating pdf file: ");
            Log::info($error);

            return redirect()->back()->with('error', 'Sorry, there was an error generating the file. Check logs for details.');

        }
    }

}
