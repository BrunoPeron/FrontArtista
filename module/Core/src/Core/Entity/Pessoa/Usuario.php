<?php


namespace Core\Entity\Pessoa;


use Doctrine\ORM\Mapping as ORM;

/**
 * oauth_clients
 *
 * @ORM\Table(name="oauth_clients")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="string", nullable=false)
     */
    public $client_id;
    /**
     * @var string
     *
     * @ORM\Column(name="client_secret", type="string", nullable=false)
     */
    public $client_secret;
    /**
     * @var string
     *
     * @ORM\Column(name="redirect_uri", type="string", nullable=false)
     */
    public $redirect_uri;
    /**
     * @var string
     *
     * @ORM\Column(name="grant_types", type="string", nullable=false)
     */
    public $grant_types;
    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", nullable=false)
     */
    public $scope;
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="user_id", type="string", nullable=false)
     */
    public $user_id;
}