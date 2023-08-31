<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public Function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Payments';
    }

    public function index(Request $request)
    {
        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date'] = $request->get('end_date', date('Y-m-d'));

        $this->data['payments'] = Payment::whereBetween('date', [$this->data['start_date'], $this->data['end_date']])
        ->get();

        return view('reports/payments', $this->data);
    }
}
