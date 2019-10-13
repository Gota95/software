<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
          'idcliente',
          'tipo_comprobante',
          'serie_comprobante',
          'num_comprobante',
          'idarticulo',
          'cantidad',
          'precio_venta',
          'descuento',
          'total_venta'
        ];
    }
}
