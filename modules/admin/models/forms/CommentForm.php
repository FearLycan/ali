<?php


namespace app\modules\admin\models\forms;


use app\models\Image;
use app\models\User;
use app\modules\admin\models\Comment;

class CommentForm extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['author_id', 'image_id', 'status', 'up_vote', 'down_vote'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }
}