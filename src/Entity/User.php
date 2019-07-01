<?php
/**
 * Created by PhpStorm.
 * User: iplayguitar81
 * Date: 6/28/19
 * Time: 9:38 PM
 */

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="`user`")
     */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    //add user's first name to user entity
    /**
     * @ORM\Column(type="string")
     */
    private $firstName;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    //override setEmail to set the userName as the email...
    public function setEmail($email)
    {
        $this->setUsername($email);
        return parent::setEmail($email);
    }


}


