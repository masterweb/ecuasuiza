<?php

class raviCWebUser extends CWebUser {

    public function isAdminUser() {
        return $this->getState('isAdminUser');
    }

    public function isSuperUser() {
        return $this->getState('isSuperUser');
    }
    
    public function isEditorUser() {
        return $this->getState('isEditorUser');
    }

}

?>
