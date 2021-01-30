<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "journal".
 *
 * @property int $journal_id
 * @property string $journal_title
 * @property string $journal_description
 * @property string $journal_img
 * @property string $journal_date
 *
 * @property AuthorJournal[] $authorJournals
 */
class Journal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal';
    }

    public $image;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_title', 'journal_description', 'journal_date'], 'required'],
            [['journal_description'], 'string'],
            [['journal_title', 'journal_img', 'journal_date'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'journal_id' => 'Journal ID',
            'journal_title' => 'Journal Title',
            'journal_description' => 'Journal Description',
            'journal_img' => 'Journal Img',
            'journal_date' => 'Journal Date',
        ];
    }

    public function getAuthors()
    {
        $query = new yii\db\Query();
        $query->select([
            'author.author_name as author_name', 
            'author.author_surname as author_surname', 
            'author.author_patronymic as author_patronymic', 
            'author.author_id as author_id'
        ])
        ->from(['author_journal'])
        ->innerJoin('author', 'author.author_id = author_journal.author_id')
        ->where([
            'author_journal.journal_id' => $this->journal_id,
        ])
        ->orderBy([
            'author.author_surname' => SORT_ASC,
        ]);

        return $query->all();

    }

    /**
     * Gets query for [[AuthorJournals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorJournals()
    {
        return $this->hasMany(AuthorJournal::className(), ['journal_id' => 'journal_id']);
    }

    public function upload(){
        if($this->validate()){
            var_dump($this->image);
        }else{
            return false;
        }
    }
}
