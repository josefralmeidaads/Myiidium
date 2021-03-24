<?php 
/** @var app\models\Author $user*/
namespace app\forms;
use app\models\Author;
use phpDocumentor\Reflection\Types\String_;
use Yii;
use yii\base\Model;


class LoginForm extends Model
{
  public $email;
  public $password;
  public $rememberMe = true;
  private $user;

  public function rules()
  {
    return [
      [['email', 'password'], 'required'],
      ['email', 'email'],
      ['email', 'trim'],
      ['rememberMe', 'boolean'],
      ['password', 'validatePasswords'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'email' => 'Email',
      'password' => 'Senha',
      'rememberMe' => 'Manter logado',
    ];
  }

  public function validatePasswords(String $attribute)
  {
    if (!$this->hasErrors()){
      return;
    }

    $user = $this->getUser();

    if(!$user || !$user->validatePassword($this->password)){
      $this->addError($attribute, 'Email ou senha incorreto(s)');
    }
  }

  public function login()
  {
    if($this->validate()){
      return Yii::$app->getUser()->login($this->getUser(), ($this->rememberMe ? 3600 * 24 * 30 : 0));
    }

    return false;
  }

  private function getUser()
  {
    if(is_null($this->user)){
      $this->user = Author::findByEmail($this->email);
    }

    return $this->user;
  }
}
?>