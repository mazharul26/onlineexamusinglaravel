<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_no'=>'nullable',
            'buyer'=>'required',
            'style_no'=>'nullable',
            'germent_details'=>'nullable',
            'fabric_details'=>'nullable',
            'yern_details'=>'nullable',
            'trim_details'=>'nullable',
            'quantity'=>'required|numeric',
            'po_purch_arecvd_date'=>'required|date',
            'req_delv_date'=>'required|date',
            'lead_time'=>'required|date',
            'yern_recei_s_date'=>'required|date',
            'yern_recei_e_date'=>'required|date',
            'fabric_qua_sub_date'=>'required|date',
            'fabric_qua_app_date'=>'required|date',
            'fabric_compo_test_sub'=>'required|date',
            'fabric_compo_test_app'=>'required|date',
            'fabric_qua_test_sub'=>'required|date',
            'fabric_qua_text_app_date'=>'required|date',
            'sss_samp_sub_date'=>'required|date',
            'sss_app_date'=>'required|date',
            'knitting_s_date'=>'required|date',
            'knitting_e_date'=>'required|date',
            'dyeing_s_date'=>'required|date',
            'dyeing_e_date'=>'required|date',
            'sewing_acce_test_sub'=>'required|date',
            'sewing_acce_inhouse_date'=>'required|date',
            'packing_acce_test_sub'=>'required|date',
            'packing_acce_inhouse_date'=>'required|date',
            'cutting_s_date'=>'required|date',
            'cutting_e_date'=>'required|date',
            'print_emb_s_date'=>'required|date',
            'print_emb_e_date'=>'required|date',
            'sewing_s_date'=>'required|date',
            'sewing_e_date'=>'required|date',
            'finish_s_date'=>'required|date',
            'finish_e_date'=>'required|date',
            'midline_inspec_date'=>'required|date',
            'final_inspec_date'=>'required|date',
            'shipment_date'=>'required|date',
        ];
    }
}
