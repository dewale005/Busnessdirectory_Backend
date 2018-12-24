<?php

namespace App\Http\Resources\Directory;

use Illuminate\Http\Resources\Json\JsonResource;

class DirectoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
            'email' => $this->email,
            'phone_no' => $this->phone_no,
            'address' => $this->address,
            'filename' => $this->filename,
            'categories' => $this->categories->all('category')
        ];
    }
}
