<?php

namespace app\models\forms;

use app\models\Comment;

class CommentForm extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required', 'message' => 'Come on, write something'],
            [['content'], 'string', 'min' => 3, 'max' => 1000],
        ];
    }
}