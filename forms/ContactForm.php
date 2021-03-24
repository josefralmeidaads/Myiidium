<?php 
  namespace app\forms;

  use yii\base\Model;

class ContactForm extends Model
  {
    public $name;
    public $email;
    public $subject;
    public $departament;
    public $message;
    public $agreed;

    const DEP_SUPPORT = 'support';
    const DEP_FINANCIAL = 'financial';

    public function rules()
    {
      return [
        [['name','email', 'subject', 'message', 'departament', 'agreed'], 'required'],
        ['name', 'string', 'length' => [1,60]],
        ['email', 'email'],
        ['departament', 'in', 'range' => [static::DEP_FINANCIAL, static::DEP_SUPPORT]],
        ['agreed', 'boolean']
      ];
    }
  }
?>