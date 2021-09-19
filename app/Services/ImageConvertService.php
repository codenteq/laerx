<?php

namespace App\Services;

use App\Models\CompanyInfo;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageConvertService
{
    public function execute($id, $model, $path)
    {
        $explode = explode('.', $path);
        $image =  $explode[0] . '.webp';
        Image::make(storage_path('app/public/' . $path))->encode('webp')->save(storage_path('app/public/'. $image));
        Storage::disk('public')->delete($path);
        switch ($model) {
            case "user":
                UserInfo::where('userId', $id)->update(['photo' => $image]);
                break;
            case "question":
                Question::find($id)->update(['imagePath' => $image]);
                break;
            case "questionChoice":
                QuestionChoice::find($id)->update(['path' => $image]);
                break;
            case "company":
                CompanyInfo::where('companyId',$id)->update(['logo' => $image]);
                break;
        }
    }
}
