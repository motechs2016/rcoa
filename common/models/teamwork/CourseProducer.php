<?php

namespace common\models\teamwork;

use common\models\team\TeamMember;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%teamwork_course_producer}}".
 *
 * @property integer $course_id
 * @property string $producer
 *
 * @property TeamMember $producerOne
 * @property CourseManage $course
 */
class CourseProducer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teamwork_course_producer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'producer'], 'required'],
            [['course_id'], 'integer'],
            [['producer'], 'string', 'max' => 36],
            [['producer'], 'exist', 'skipOnError' => true, 'targetClass' => TeamMember::className(), 'targetAttribute' => ['producer' => 'u_id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeamworkCourseManage::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('rcoa/teamwork', 'Course ID'),
            'producer' => Yii::t('rcoa/teamwork', 'Producer'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProducerOne()
    {
        return $this->hasOne(TeamMember::className(), ['u_id' => 'producer']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(TeamworkCourseManage::className(), ['id' => 'course_id']);
    }
}