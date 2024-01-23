<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'updated_at' => $this->updated_at,
            'name' => $this->name,
            'code' => $this->email,
            "password" => $this->password,
            'documents' => new DocumentResourceCollection(
                $this->documents()
                    ->where('created_at', '>=', Carbon::now()->subDays(7))
                    ->get()
            ),
        ];
    }
}
