<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'category' => QuestionTypeResource::collection($this->whenLoaded('types')),
            'choices' => QuestionChoiceResource::collection($this->whenLoaded('choice')),
            'questionImage' => $this->questionImage,
            'imagePath' => $this->imagePath,
            'choiceImage' => $this->choiceImage,
        ];
    }
}
