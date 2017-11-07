<?php

namespace App\Models;

use App\Models\Traits\{GetModel ,SetModel, GetUserAuthorization};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use GetModel, SetModel, GetUserAuthorization;

    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = ['user_id', 'title', 'content', 'image'];

    public $relations = ['categoryArticles'];
    public $ordering = 'asc';
    public $orderingField = 'id';
    public $disk = 'articles';
    private $result = [
        'status' => false,
    ];

    public function categoryArticles()
    {
        return $this->hasMany('App\Models\CategoryArticles', 'article_id', 'id');
    }

    public function categoryComplement()
    {
        return $this->belongsToMany('App\Models\Article', 'category_articles',
            'article_id', 'category_id');
    }

    private function prepare($request)
    {
        return [
            'user_id' => $this->userAuth,
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $this->uploadFile(),
        ];
    }

    public function createArticle($request)
    {
        DB::beginTransaction();
        try {
            $result = self::create($this->prepare($request));
            if(!$result){
                DB::rollback();
            }else{
                $result->addRelationData($request);
                $this->result = [
                    'status' => true,
                    'articles' => $result
                ];
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollback();
        }
        return $this->result;
    }

    private function addRelationData($request)
    {
        $this->categoryComplement()->detach();
        $this->categoryComplement()->attach($request['categories']);
    }

    public function updateArticle($request)
    {
        DB::beginTransaction();
        try {
            $model = $this->getOneData($request['id']);
            $result = $model->update($model->prepare($request));
            if(!$result){
                DB::rollback();
            }else{
                $model->addRelationData($request);
                $this->result = [
                    'status' => true,
                    'articles' => $model
                ];
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollback();
        }
        return $this->result;
    }

}
