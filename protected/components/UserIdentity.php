<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    
    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $comprobar = TblUser::model()->find('username=:username AND password=:password', array(':username' => $this->username, ':password' => md5($this->password)));

        if ($comprobar->user_level >= 4) {
            yii::app()->user->setState("isAdminUser", true);
        } else {
            yii::app()->user->setState("isAdminUser", false);
        }
        if ($comprobar->user_level == 3) {
            yii::app()->user->setState("isEditorUser", true);
        } else {
            yii::app()->user->setState("isEditorUser", false);
        }
        if (!isset($comprobar))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }
    
    public function getId()
    {
        return $this->_id;
    }

}