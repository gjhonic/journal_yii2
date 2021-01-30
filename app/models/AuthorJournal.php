<?php

namespace app\models;

use Yii;
use app\models\Journal;
use app\models\Author;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $author_id 
 * @property string $journal_id 
 *
 * @property AuthorJournal[] $authorJournals
 */
class AuthorJournal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author_journal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'journal_id'], 'required'],
            [['author_id', 'journal_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author',
            'journal_id' => 'Author',
        ];
    }

    public function getJournals(){
        return Journal::find()->where(['journal_id' => $this->journal_id])->all();
    }

    public function getAuthors(){
        return Author::find()->where(['author_id' => $this->author_id])->all();
    }

}
