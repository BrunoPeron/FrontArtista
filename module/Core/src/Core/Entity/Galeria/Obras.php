<?php

namespace Core\Entity\Galeria;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obras
 *
 * @ORM\Table(name="obras")
 * @ORM\Entity
 */
class Obras
{
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", nullable=false)
     */
    public $img;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="obras_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)
     */
    public $nome;
    /**
     * @var string
     *
     * @ORM\Column(name="artista", type="string", nullable=false)
     */
    public $artista;
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", nullable=false)
     */
    public $descricao;
    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=false)
     */
    public $likes;
    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     */
    public $iduser;

}