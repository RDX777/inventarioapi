<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class ComputerRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validator = [
            'processor'=>'string|nullable',
            'memory_size'=>'numeric',
            'video'=>'string|nullable',
            'video_size'=>'numeric',
            'hard_disk_size'=>'numeric',
            'ssd_size'=>'numeric',
            'network_cable_mac'=>'nullable|regex:/^([0-9a-fA-F]{2}:){5}[0-9a-fA-F]{2}$/',
            'network_wireless_mac'=>'nullable|regex:/^([0-9a-fA-F]{2}:){5}[0-9a-fA-F]{2}$/',
            'manufacturer_name'=>'string|nullable',
            'is_notebook'=>'boolean',
            'comments'=>'string|nullable',
            'model'=>'string|nullable',
            'serial_number'=>'required|string|unique:App\Models\Computer,serial_number',
            'hostname' => 'required|string|unique:App\Models\Computer,hostname'
        ];

        if ($request->method == 'PUT' or $request->method == 'PATCH') {
            $validator['serial_number'] = 'required|string';
            $validator['hostname'] = 'required|string';
        }

        return $validator;
    }

    public function messages() {
        return [
            'processor.string'=>'O campo deve ser uma string',
            'memory_size.numeric'=>'O campo deve ser um numero',
            'video.string'=>'O campo deve ser uma string',
            'video_size.numeric'=>'O campo deve ser um numero',
            'hard_disk_size.numeric'=>'O campo deve ser um numero',
            'ssd_size.numeric'=>'O campo deve ser um numero',
            'network_cable_mac.regex'=>'Formato de MAC ADRESS = "00:00:00:00:00:00"',
            'network_wireless_mac.regex'=>'Formato de MAC ADRESS = "00:00:00:00:00:00"',
            'manufacturer_name.string'=>'O campo deve ser uma string',
            'is_notebook.boolean'=>'O campo deve ser um boolean',
            'comments.string'=>'O campo deve ser uma string do tipo texto',
            'model.string'=>'O campo deve ser uma string',
            'serial_number.required'=>'Obrigatorio informar um serial number',
            'serial_number.string'=>'O campo deve ser uma string',
            'serial_number.unique'=>'O serial number ja existe',
            'hostname.required'=>'Obrigatorio informar um serial number',
            'hostname.string'=>'O campo deve ser uma string',
            'hostname.unique'=>'O hostname ja existe'
        ];
    }
}
