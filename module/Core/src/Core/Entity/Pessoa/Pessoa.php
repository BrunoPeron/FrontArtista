<?php
namespace Core\Entity\Pessoa;


use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoap")
 * @ORM\Entity
 */
class Pessoa
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomep", type="string", nullable=false)
     */
    public $nomep;
    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", nullable=false)
     */
    public $sobrenome;
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", nullable=false)
     */
    public $cpf;
    /**
     * @var integer
     *
     * @ORM\Column(name="idade", type="integer", nullable=false)
     */
    public $idade;
    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", nullable=false)
     */
    public $sexo;
    /**
     * @var string
     *
     * @ORM\Column(name="profissao", type="string", nullable=false)
     */
    public $profissao;
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", nullable=false)
     */
    public $descricao;
    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", nullable=false)
     */
    public $pais;
    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=false)
     */
    public $estado;
    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", nullable=false)
     */
    public $cidade;
    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", nullable=false)
     */
    public $bairro;
    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", nullable=false)
     */
    public $rua;
    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", nullable=false)
     */
    public $cep;
    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", nullable=false)
     */
    public $complemento;
    /**
     * @var string
     *
     * @ORM\Column(name="infadd", type="string", nullable=false)
     */
    public $infadd;
    /**
     * @var integer
     *
     * @ORM\Column(name="codpessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pessoap_codpessoa_seq", allocationSize=1, initialValue=1)
     */
    public $codpessoa;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datanasc", type="datetime", nullable=false)
     */
    public $datanasc;
}
