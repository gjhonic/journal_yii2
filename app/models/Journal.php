<?php

namespace app\models;

use Yii;

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_title', 'journal_description', 'journal_img', 'journal_date'], 'required'],
            [['journal_description'], 'string'],
            [['journal_title', 'journal_img', 'journal_date'], 'string', 'max' => 255],
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

    /**
     * Gets query for [[AuthorJournals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorJournals()
    {
        return $this->hasMany(AuthorJournal::className(), ['journal_id' => 'journal_id']);
    }
}
