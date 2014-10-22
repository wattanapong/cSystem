<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;

  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirstName(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->name;
  }
  
  function getPrivilege(){
  	  $user = $this->loadUser(Yii::app()->user->id); 
  	if ($user){
  		$pid = $user->privilege_id;
  		$privilege = Privilege::model()->findByPk($pid);
  	}else return null;
  	return $privilege->value;  
  }
  
  function getPrivilegeId($pVal){
  		$privilege = Privilege::model()->find(' value = \''.$pVal.'\' ');
  	return $privilege->id;
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){
  	return ( Yii::app()->user->getPrivilege() === "administrator")?1:0;
  }
  
  function isTeacher(){
  	return ( Yii::app()->user->getPrivilege() === "teacher")?1:0;
  }
  
  function isStudent(){
  	return ( Yii::app()->user->getPrivilege() === "student")?1:0;
  }
 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Member::model()->findByPk($id);
        }
        return $this->_model;
    }
}
?>