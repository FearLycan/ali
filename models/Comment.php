<?php

namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $content
 * @property int $author_id
 * @property int $image_id
 * @property int $parent_id
 * @property int $status
 * @property int $up_vote
 * @property int $down_vote
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property Image $image
 * @property Comment $parent
 * @property Comment[] $comments
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    const STATUS_BAN = 10;

    /**
     * @param bool $insert
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => (new \DateTime("now", new \DateTimeZone("UTC")))->format("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['author_id', 'image_id', 'parent_id', 'status', 'up_vote', 'down_vote'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'author_id' => 'Author ID',
            'image_id' => 'Image ID',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'up_vote' => 'Up Vote',
            'down_vote' => 'Down Vote',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Comment::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['parent_id' => 'id']);
    }

    public function upVote($value)
    {
        $this->up_vote = $this->up_vote + $value;

        if ($this->up_vote < 0) {
            $this->up_vote = 0;
        }

        $this->save(false);
    }

    /**
     * @param Integer $value
     */
    public function downVote($value)
    {
        $this->down_vote = $this->down_vote + $value;

        if ($this->down_vote < 0) {
            $this->down_vote = 0;
        }

        $this->save(false);
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_BAN => 'Ban',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return self::getStatusNames()[$this->status];
    }
}
