<?php

namespace MbcApiContent\App\Models;

use Illuminate\Database\Eloquent\Model;


class Template  extends Model
{

    protected $table = 'template';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "template_data",
        "template_content"
    ];

    protected $casts = [
        'template_data' => 'array',
    ];


    // doc
    public function page()
    {
        return $this->hasOne(Page::class);
    }


    public function index(){
        $template = Template::with('page')->get();
    }


}
