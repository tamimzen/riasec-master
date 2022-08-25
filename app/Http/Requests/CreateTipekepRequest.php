<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTipekepRequest extends FormRequest
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
            'namatipe'              => 'required|string|max:70', 
            'keterangan_tipe'       => 'required|string',
            'julukan_tipe'          => 'required|string',
            'deskripsi_tipe'        => 'required|string',
            'arti_sukses'           => 'required|string',
            'saran_pengembangan'    => 'required|string',
            'kebahagiaan_tipe'      => 'required|string',
            'image_tipe'            => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ];
    }
}
