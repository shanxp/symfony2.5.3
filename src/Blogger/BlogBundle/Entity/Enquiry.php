<?php
// src/Blogger/BlogBundle/Entity/Enquiry.php

namespace Blogger\BlogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;


class Enquiry
{
    protected $name;

    protected $email;

    protected $subject;

    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());

        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'symblog does not like invalid emails. Give me a real one!'
        )));

        $metadata->addPropertyConstraint('subject', new Assert\NotBlank());
        $metadata->addPropertyConstraint('subject', new Assert\Length(array(
            'min'        => 2,
            'max'        => 50,
            'minMessage' => 'Your subject must be at least {{ limit }} characters length',
            'maxMessage' => 'Your subject cannot be longer than {{ limit }} characters length',
        )));
        $metadata->addPropertyConstraint('body', new Assert\Length(array(
            'min'        => 10,
            'max'        => 50,
            'minMessage' => 'Your body must be at least {{ limit }} characters length',
            'maxMessage' => 'Your body cannot be longer than {{ limit }} characters length',
        )));
    }
}