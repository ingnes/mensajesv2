<?php

namespace App\Imports;

use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;

use App\Models\Message;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow,WithValidation,ToCollection};
use Maatwebsite\Excel\Excel;

class MessagesImport implements ToModel, WithHeadingRow , WithValidation, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {       
        // return new Message([
        //    'nombre'  => trim($row['nombre']),
        //    'email'   => trim($row['email']),
        //    'mensaje' => trim($row['mensaje']),
        // ]);       
    }

    public function collection(Collection $rows)
    {
   
      foreach($rows as $row)
      { 
        
        $mensaje = new Message;
        $mensaje->nombre = trim($row['nombre']);
        $mensaje->email   = trim($row['email']);
        $mensaje->mensaje = trim($row['mensaje']);
        $mensaje->save();
       }
    }

    public function rules(): array
    {
         return [
           'nombre' => 'required|string',
           'email'  => 'required|email',
           'mensaje' => 'required|max:250'
        ];
    }

   
}
