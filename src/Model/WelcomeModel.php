<?php

class WelcomeModel
{
    const SITE_TITLE_LABEL = 'titre du blog';
    const SITE_TITLE_NAME = 'blog_title';

    const SITE_INSTALLED_LABEL = 'Site installé';
    const SITE_INSTALLED_NAME = 'blog_installed';



    private ?string $siteTitle;
    private ?string $userName;
    private ?string $password;

    /**
     * Get the value of siteTitle
     */ 
    public function getSiteTitle()
    {
        return $this->siteTitle;
    }

    /**
     * Set the value of siteTitle
     *
     * @return  self
     */ 
    public function setSiteTitle($siteTitle)
    {
        $this->siteTitle = $siteTitle;

        return $this;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}