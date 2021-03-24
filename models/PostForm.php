<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

/**
 * Class PostForm
 * @package app\models
 */
class PostForm extends Model
{
    public $moderate = 1;
    public $subject;
    public $description;
    public $post;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['subject', 'description', 'post'], 'required'],
            [['subject', 'description', 'post'], 'string'],
            [['moderate'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'moderate' => 'Опубликовать',
            'subject' => 'Заголовок',
            'description' => 'Превью',
            'post' => 'Новость',
        ];
    }

    /**
     * @return bool
     */
    public function create()
    {
        if ($this->validate()) {
            $post = new Posts([
                'moderate' => (int)$this->moderate,
                'subject' => Html::encode($this->subject),
                'description' => Html::encode($this->description),
                'post' => Html::encode($this->post),
            ]);

            return $post->save();
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        if ($this->validate()) {
            $post = Posts::findOne(['id' => $id]);
            $post->updateAttributes([
                'moderate' => (int)$this->moderate,
                'subject' => Html::encode($this->subject),
                'description' => Html::encode($this->description),
                'post' => Html::encode($this->post),
            ]);

            return $post->save();
        }

        return false;
    }

}