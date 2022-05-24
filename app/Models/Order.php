<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no',
        'buyer_id',
        'pl_germent_details',
        'pl_fabric_details',
        'pl_yern_details',
        'pl_trim_details',
        'pl_quantity',
        'pl_po_purch_recvd_d',
        'pl_req_delv_dt',
        'pl_lead_time',
        'pl_yern_recei_s_dt',
        'pl_yern_recei_e_dt',
        'pl_fabric_qlt_sub_dt',
        'pl_fabric_qlt_app_dt',
        'pl_fabric_compo_tst_sub',
        'pl_fabric_compo_tst_app',
        'pl_fabric_qlt_tst_sub',
        'pl_fabric_qlt_tst_app_dt',
        'pl_sss_samp_sub_dt',
        'pl_sss_app_dt',
        'pl_knitting_s_dt',
        'pl_knitting_e_dt',
        'pl_dyeing_s_dt',
        'pl_dyeing_e_dt',
        'pl_sewing_acce_tst_sub',
        'pl_sewing_acce_inhouse_dt',
        'pl_packing_acce_tst_sub',
        'pl_packing_acce_inhouse_dt',
        'pl_cutting_s_dt',
        'pl_cutting_e_dt',
        'pl_print_emb_s_dt',
        'pl_print_emb_e_dt',
        'pl_sewing_s_dt',
        'pl_sewing_e_dt',
        'pl_finish_s_dt',
        'pl_finish_e_dt',
        'pl_midline_inspec_dt',
        'pl_final_inspec_dt',
        'pl_shipment_dt',
        'al_germent_details',
        'al_fabric_details',
        'al_yern_details',
        'al_trim_details',
        'al_quantity',
        'al_po_purch_recvd_d',
        'al_req_delv_dt',
        'al_lead_time',
        'al_yern_recei_s_dt',
        'al_yern_recei_e_dt',
        'al_fabric_qlt_sub_dt',
        'al_fabric_qlt_app_dt',
        'al_fabric_compo_tst_sub',
        'al_fabric_compo_tst_app',
        'al_fabric_qlt_tst_sub',
        'al_fabric_qlt_tst_app_dt',
        'al_sss_samp_sub_dt',
        'al_sss_app_dt',
        'al_knitting_s_dt',
        'al_knitting_e_dt',
        'al_dyeing_s_dt',
        'al_dyeing_e_dt',
        'al_sewing_acce_tst_sub',
        'al_sewing_acce_inhouse_dt',
        'al_packing_acce_tst_sub',
        'al_packing_acce_inhouse_dt',
        'al_cutting_s_dt',
        'al_cutting_e_dt',
        'al_print_emb_s_dt',
        'al_print_emb_e_dt',
        'al_sewing_s_dt',
        'al_sewing_e_dt',
        'al_finish_s_dt',
        'al_finish_e_dt',
        'al_midline_inspec_dt',
        'al_final_inspec_dt',
        'al_shipment_dt',
        'pl_picture',//Next Instruction
        'pl_germents_smv',
        'pl_fabric_consumtion',
        'pl_color_name',
        'pl_color_wise_qty',
        'pl_print_name',
        'pl_sewing_acc_dets',
        'pl_packing_acc_dets',
        'pl_buld_fab_qlt_app_dt',
        'pl_lab_dip_app_dt',
        'pl_print_app_dt',
        'pl_garments_app_dt',
        'pl_pp_app_dt',
        'pl_size_set_app_dt',
        'pl_yarn_rf_no',
        'pl_yarn_qty',
        'pl_fabric_qty',
        'pl_fabric_ready_dt',
        'pl_cutting_dt',
        'pl_no_of_line',
        'pl_sewing_prod_line',
        'pl_sewing_prod_day',
        'pl_sewing_compl_dt',
        'pl_finish_compl_dt',
        'pl_fabric_rejec',
        'pl_cutting_rejec',
        'pl_sewing_rejec',
        'pl_finish_rejec',
        'pl_dhu',
        'pl_final_pack_qty',
        'pl_excess_short_qty',
        'pl_final_shipp_qlt',
        'pl_value',
        'al_picture',//Next Instruction
        'al_germents_smv',
        'al_fabric_consumtion',
        'al_color_name',
        'al_color_wise_qty',
        'al_print_name',
        'al_sewing_acc_dets',
        'al_packing_acc_dets',
        'al_buld_fab_qlt_app_dt',
        'al_lab_dip_app_dt',
        'al_print_app_dt',
        'al_garments_app_dt',
        'al_pp_app_dt',
        'al_size_set_app_dt',
        'al_yarn_rf_no',
        'al_yarn_qty',
        'al_fabric_qty',
        'al_fabric_ready_dt',
        'al_cutting_dt',
        'al_no_of_line',
        'al_sewing_prod_line',
        'al_sewing_prod_day',
        'al_sewing_comal_dt',
        'al_finish_comal_dt',
        'al_fabric_rejec',
        'al_cutting_rejec',
        'al_sewing_rejec',
        'al_finish_rejec',
        'al_dhu',
        'al_final_pack_qty',
        'al_excess_short_qty',
        'al_final_shipp_qty',
        'al_value'

    ];

    public function buyer(){
        return $this->belongsTo(Buyer::class,'buyer_id');
    }
    public function fi()
    {
        if ($this->pl_picture) {
            return $this->pl_picture;
        } else {
            return 'pfi.png';
        }
    }

    public function fi_al()
    {
        if ($this->al_picture) {
            return $this->al_picture;
        } else {
            return 'pfi.png';
        }
    }

    public function plcolorquantity(){
        return $this->hasMany(OrderColorQuantity::class,'order_id')->where('pl_color_name','<>',null);
    }
    public function alcolorquantity(){
        return $this->hasMany(OrderColorQuantity::class,'order_id')->where('al_color_name','<>',null);
    }
}
