<?php

namespace app\models;

use app\core\activeRecord\DropDownList;
use app\core\activeRecord\ErrorsToString;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property int $status
 *
 * @property Articles[] $articles
 */
class Author extends ActiveRecord implements IdentityInterface
{
    use DropDownList, ErrorsToString;
    const STATUS_DRAFT = 1;
    const STATUS_REVIEW = 2;
    const STATUS_PUBLISHED = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{authors}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['status'], 'integer'],
            [['name', 'email', 'password'], 'string', 'max' => 60],
            [['email' => 'email'], 'unique'],
            [['access_token', 'auth_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome do Autor',
            'email' => 'Email do Autor',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::class, ['author_id' => 'id']);
    }

    public function getAuthKey(): string {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    public function validatePassword(string $password):bool
    {   
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function findByEmail(string $email)
    {
      return static::findOne(['email' => $email]);
    }

}
