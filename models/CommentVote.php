<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment_vote}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $comment_id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Comment $comment
 * @property User $user
 */
class CommentVote extends \yii\db\ActiveRecord
{
    const TYPE_UP = 'up';
    const TYPE_DOWN = 'down';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment_vote}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'comment_id'], 'integer'],
            [['type'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string', 'max' => 10],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'comment_id' => 'Comment ID',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_UP,
            self::TYPE_DOWN,
        ];
    }
}