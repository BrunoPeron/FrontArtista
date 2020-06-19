<?php

namespace Core\Entity\Servicos;

use Doctrine\ORM\Mapping as ORM;

/**
 * meusservicos
 *
 * @ORM\Table(name="meusservicos")
 * @ORM\Entity
 */
class meusservicos
{
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)
     */
    public $nome;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="meusservicos_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", nullable=false)
     */
    public $descricao;
    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", nullable=false)
     */
    public $cliente;
    /**
     * @var integer
     *
     * @ORM\Column(name="clienteid", type="integer", nullable=false)
     */
    public $clienteid;
    /**
     * @var string
     *
     * @ORM\Column(name="artista", type="string", nullable=false)
     */
    public $artista;
    /**
     * @var integer
     *
     * @ORM\Column(name="artistaid", type="integer", nullable=false)
     */
    public $artistaid;
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    public $status;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datainicio", type="datetime", nullable=false)
     */
    public $dataInicio;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datafim", type="datetime", nullable=false)
     */
    public $dataFim;

}