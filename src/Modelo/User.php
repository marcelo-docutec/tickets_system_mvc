<?php 

namespace model;

class User{

    private $id_user;
    private $nickname;
    private $email;
    private $password;
    private $id_role;
    private $id_facebook;


    /**
     * Class Constructor
     * @param    $id_user   
     * @param    $nickname   
     * @param    $email   
     * @param    $password   
     * @param    $id_role   
     */
    public function __construct($nickname, $email, $password, $id_role)
    {
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
        $this->id_role = $id_role;
    }




    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     *
     * @return self
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     *
     * @return self
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * @param mixed $id_role
     *
     * @return self
     */
    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }
}

