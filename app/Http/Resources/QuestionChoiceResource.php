<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionChoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $questions = $this->whenLoaded('question');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'path' => $this->path,
            'questions' => new QuestionResource($questions)
        ];
    }
}
