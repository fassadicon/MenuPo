<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadLogsController extends Controller
{
    public function download_sales_report(){
        
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <style>
            h2{
                text-align: center;
            }
            th{
                width: 75px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
            .total{
                font-weight: bold;
            }
            .stockReport th{
                width: 130px;
            }
            .stockReport td{
                height: 25px;
            }
        </style>
        <body>

            <h2> <u>Daily Stock and Amount Report </u> </h2>
            <table class="stockReport">
                <tr>
                    <th>Name</th>
                    <th>Start</th>
                    <th>Add</th>
                    <th>Sold</th>
                    <th>End</th>
                    <th>Amount</th>
                </tr>';
                
            
                // for($i = 0; $i < sizeof(); $i++){
                //     $html .= '<tr> ';   
                //     $html .= '<td></td>';
                //     $html .= '<td></td>';
                //     $html .= '<td></td>';
                //     $html .= '<td></td>';
                //     $html .= '<td></td>';
                //     $html .= '<td></td>';
                //     $html .= '</tr>';
                // }

                $html .= '
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Total: </b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td><b>Prepared by: </b></td>
                        <td colspan="2"></td>
                        <td><b>Checked by: </b></td>
                        <td colspan="2"></td>
                    </tr>
                ';
        
        $html .= '
            </table>
            <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>

        </body>
        </html>
        
        ';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Canteen Sales Report');

        return redirect()->back();
    }
}
