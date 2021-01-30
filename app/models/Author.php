<?php

namespace app\models;

use Yii;
use app\models\Journal;

/**
 * This is the model class for table "author".
 *
 * @property int $author_id
 * @property string $author_name
 * @property string $author_surname
 * @property string $author_patronymic
 *
 * @property AuthorJournal[] $authorJournals
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_name', 'author_surname'], 'required'],
            [['author_name', 'author_surname', 'author_patronymic'], 'string', 'max' => 255],
            [['author_surname'], 'string', 'min' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Author ID',
            'author_name' => 'Author Name',
            'author_surname' => 'Author Surname',
            'author_patronymic' => 'Author Patronymic',
        ];
    }

    public function getJournals()
    {
        $query = new yii\db\Query();
        $query->select([
            'journal.journal_title as journal_title', 
            'journal.journal_date as journal_date', 
            'journal.journal_id as journal_id'
        ])
        ->from(['author_journal'])
        ->innerJoin('journal', 'journal.journal_id = author_journal.journal_id')
        ->where([
            'author_journal.author_id' => $this->author_id,
        ])
        ->orderBy([
            'journal.journal_id' => SORT_DESC,
        ]);

        return $query->all();

    //   $sql= " SELECT journal.journal_title as journal_title, journal.journal_date as journal_date, journal.journal_id as journal_id
    //             FROM author_journal
    //             LEFT JOIN journal ON journal.journal_id = author_journal.journal_id
    //             WHERE author_journal.author_id =".$this->author_id."
    //             ORDER BY journal.journal_id DESC";
    //     $connection=Yii::$app->db;
    //     return $connection->createCommand($sql)->queryAll();

    }

    /**
     * Gets query for [[AuthorJournals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorJournals()
    {
        return $this->hasMany(AuthorJournal::className(), ['author_id' => 'author_id']);
    }
}
