<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.07.2019
 * Time: 20:33
 */

namespace app\components;


use yii\base\Component;

class DaoComponent extends Component
{
    /**
     * @param $idUser
     * @return array
     * @throws \yii\db\Exception
     */
    public function getUserAudio($idUser)
    {
        $sql = 'select * from audio where user_id = :user_id';

        return \Yii::$app->db->createCommand($sql)
            ->bindValue(':user_id', (int)$idUser)
            ->queryAll();
    }

    /**
     * @param $idUser
     * @return array
     * @throws \yii\db\Exception
     */
    public function getUserVideo($idUser)
    {
        $sql = 'select * from video where user_id = :user_id';

        return \Yii::$app->db->createCommand($sql)
            ->bindValue(':user_id', (int)$idUser)
            ->queryAll();
    }

    /**
     * @param $idUser
     * @return array|false
     * @throws \yii\db\Exception
     */
    public function getUserAvatar($idUser)
    {
        $sql = 'select * from avatar where user_id = :user_id and active = :active';

        return \Yii::$app->db->createCommand($sql)
            ->bindValues([':user_id' => (int)$idUser, ':active' => 'Y'])
            ->queryOne();
    }

    /**
     * @param $idUser
     * @return array
     * @throws \yii\db\Exception
     */
    public function getUserAvatars($idUser)
    {
        $sql = 'select * from avatar where user_id = :user_id';

        return \Yii::$app->db->createCommand($sql)
            ->bindValue(':user_id', (int)$idUser)
            ->queryAll();
    }

    /**
     * @param $idUser
     * @return array
     * @throws \yii\db\Exception
     */
    public function getUserPhoto($idUser)
    {
        $sql = 'select * from photo where user_id = :user_id';

        return \Yii::$app->db->createCommand($sql)
            ->bindValue(':user_id', (int)$idUser)
            ->queryAll();
    }
}